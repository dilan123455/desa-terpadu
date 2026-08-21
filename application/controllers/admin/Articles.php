<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articles extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Article_model');
        $this->load->helper(['url', 'text', 'form']);
        $this->load->library('form_validation');
    }

    /**
     * Halaman daftar artikel
     */
    public function index()
    {
        $data['title']         = 'Artikel';
        $data['name']          = $this->session->userdata('name');
        $data['page_title']    = 'Artikel';
        $data['page_subtitle'] = 'Kelola artikel dan berita Desa Terpadu';
        $data['articles']      = $this->Article_model->get_all();

        $this->load->view('admin/articles/index', $data);
    }

    /**
     * Halaman detail artikel
     */
    public function detail($id)
    {
        $article = $this->Article_model->get_by_id($id);

        if (!$article) {
            show_404();
        }

        $data['title']         = 'Detail Artikel';
        $data['name']          = $this->session->userdata('name');
        $data['page_title']    = 'Detail Artikel';
        $data['page_subtitle'] = 'Lihat detail artikel';
        $data['article']       = $article;

        $this->load->view('admin/articles/detail', $data);
    }

    /**
     * Halaman tambah artikel
     */
    public function create()
    {
        $data['title']         = 'Tambah Artikel';
        $data['name']          = $this->session->userdata('name');
        $data['page_title']    = 'Tambah Artikel';
        $data['page_subtitle'] = 'Buat artikel baru';

        $this->load->view('admin/articles/create', $data);
    }

    /**
     * Proses simpan artikel baru
     */
    public function store()
    {
        // Validasi form
        $this->form_validation->set_rules('title', 'Judul', 'required|trim');
        $this->form_validation->set_rules('category', 'Kategori', 'required|trim');
        $this->form_validation->set_rules('content', 'Isi Artikel', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required|in_list[draft,published]');
        $this->form_validation->set_rules('publish_date', 'Tanggal Upload', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan kembali form create
            $this->create();
            return;
        }

        // Ambil input
        $title        = $this->input->post('title', TRUE);
        $category     = $this->input->post('category', TRUE);
        $content      = $this->input->post('content', FALSE); // FALSE agar tidak di-escape (HTML diperbolehkan)
        $status       = $this->input->post('status', TRUE);
        $publish_date = $this->input->post('publish_date', TRUE);

        // Buat slug dari judul
        $slug = url_title($title, 'dash', TRUE);

        // Upload gambar (opsional)
        $image = NULL;
        if (!empty($_FILES['image']['name'])) {
            $config['upload_path']   = FCPATH . 'assets/uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|webp';
            $config['max_size']      = 5120; // 5 MB
            $config['encrypt_name']  = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                $this->session->set_flashdata('error', $this->upload->display_errors('', ''));
                $this->create();
                return;
            }

            $uploadData = $this->upload->data();
            $image = $uploadData['file_name'];
        }

        // Siapkan data
        $data = [
            'title'        => $title,
            'slug'         => $slug,
            'category'     => $category,
            'content'      => $content,
            'image'        => $image,
            'author_id'    => $this->session->userdata('user_id'),
            'status'       => $status,
            'publish_date' => $publish_date,
            'published_at' => ($status === 'published') ? date('Y-m-d H:i:s') : NULL
        ];

        // Simpan ke database
        if ($this->Article_model->insert($data)) {
            $this->session->set_flashdata('success', 'Artikel berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan artikel.');
        }

        redirect('admin/articles');
    }

    /**
     * Halaman edit artikel
     */
    public function edit($id)
    {
        $article = $this->Article_model->get_by_id($id);

        if (!$article) {
            show_404();
        }

        $data['title']         = 'Edit Artikel';
        $data['name']          = $this->session->userdata('name');
        $data['page_title']    = 'Edit Artikel';
        $data['page_subtitle'] = 'Perbarui artikel';
        $data['article']       = $article;

        $this->load->view('admin/articles/edit', $data);
    }

    /**
     * Proses update artikel
     */
    public function update($id)
    {
        $article = $this->Article_model->get_by_id($id);

        if (!$article) {
            show_404();
        }

        // Validasi form
        $this->form_validation->set_rules('title', 'Judul', 'required|trim');
        $this->form_validation->set_rules('category', 'Kategori', 'required|trim');
        $this->form_validation->set_rules('content', 'Isi Artikel', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required|in_list[draft,published]');
        $this->form_validation->set_rules('publish_date', 'Tanggal Upload', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Tampilkan kembali form edit dengan error
            $this->edit($id);
            return;
        }

        // Ambil input
        $title        = $this->input->post('title', TRUE);
        $category     = $this->input->post('category', TRUE);
        $content      = $this->input->post('content', FALSE);
        $status       = $this->input->post('status', TRUE);
        $publish_date = $this->input->post('publish_date', TRUE);

        // Slug baru
        $slug = url_title($title, 'dash', TRUE);

        // Gambar: jika tidak upload baru, gunakan gambar lama
        $image = $article->image;

        // Jika upload gambar baru
        if (!empty($_FILES['image']['name'])) {
            $config['upload_path']   = FCPATH . 'assets/uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|webp';
            $config['max_size']      = 5120;
            $config['encrypt_name']  = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                $this->session->set_flashdata('error', $this->upload->display_errors('', ''));
                $this->edit($id);
                return;
            }

            $uploadData = $this->upload->data();
            $image = $uploadData['file_name'];

            // Hapus gambar lama
            if (!empty($article->image)) {
                $oldImage = FCPATH . 'assets/uploads/' . $article->image;
                if (file_exists($oldImage)) {
                    unlink($oldImage);
                }
            }
        }

        // Data update
        $data = [
            'title'        => $title,
            'slug'         => $slug,
            'category'     => $category,
            'content'      => $content,
            'image'        => $image,
            'status'       => $status,
            'publish_date' => $publish_date,
            'published_at' => ($status === 'published') 
                ? ($article->published_at ?: date('Y-m-d H:i:s'))
                : NULL
        ];

        // Update database
        if ($this->Article_model->update($id, $data)) {
            $this->session->set_flashdata('success', 'Artikel berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui artikel.');
        }

        redirect('admin/articles');
    }

    /**
     * Hapus artikel
     */
    public function delete($id)
    {
        $article = $this->Article_model->get_by_id($id);

        if (!$article) {
            show_404();
        }

        // Hapus file gambar
        if (!empty($article->image)) {
            $imagePath = FCPATH . 'assets/uploads/' . $article->image;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $this->Article_model->delete($id);

        $this->session->set_flashdata('success', 'Artikel berhasil dihapus.');
        redirect('admin/articles');
    }
}