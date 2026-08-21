<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Features extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Features_model');
        $this->load->library('upload');
        $this->load->library('form_validation');
    }

    // Helper untuk menghapus file gambar jika bukan URL dan file ada
    private function _delete_image($image_path)
    {
        // Jika path adalah URL, jangan hapus
        if (preg_match('/^https?:\/\//i', $image_path)) {
            return;
        }

        // Cek apakah file benar-benar ada di folder uploads/platform/
        $file_path = FCPATH . 'uploads/platform/' . $image_path;
        if ($image_path && file_exists($file_path)) {
            unlink($file_path);
        }
    }

    public function index()
    {
        $data['title']         = 'Features';
        $data['name']          = $this->session->userdata('name');
        $data['page_title']    = 'Features';
        $data['page_subtitle'] = 'Kelola fitur unggulan Desa Terpadu';

        $data['platforms'] = $this->Features_model->get_platforms();
        $data['items']     = $this->Features_model->get_all_items();

        $this->load->view('admin/features/index', $data);
    }

    public function edit_platform($id)
    {
        $data['title']         = 'Edit Platform';
        $data['name']          = $this->session->userdata('name');
        $data['page_title']    = 'Edit Platform';
        $data['page_subtitle'] = 'Perbarui data platform';

        $data['platform'] = $this->Features_model->get_platform($id);

        if (!$data['platform']) {
            show_404();
        }

        $this->load->view('admin/features/edit_platform', $data);
    }

    public function update_platform($id)
    {
        $name        = $this->input->post('name', TRUE);
        $description = $this->input->post('description', TRUE);
        $sort_order  = $this->input->post('sort_order', TRUE);

        // Validasi
        $this->form_validation->set_rules('name', 'Nama Platform', 'required|trim');
        $this->form_validation->set_rules('sort_order', 'Urutan', 'integer|greater_than_equal_to[0]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect("admin/features/edit_platform/{$id}");
        }

        // Ambil data platform lama
        $existing_platform = $this->Features_model->get_platform($id);

        $image = $existing_platform->image; // default gambar lama

        // Tangani upload file baru
        if (!empty($_FILES['image']['name'])) {
            $config['upload_path']   = './uploads/platform/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png|webp';
            $config['max_size']      = 2048;
            $config['encrypt_name']  = TRUE;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data('file_name');

                // Hapus gambar lama jika ada (bukan URL)
                $this->_delete_image($existing_platform->image);
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect("admin/features/edit_platform/{$id}");
            }
        }

        $data = [
            'name'        => $name,
            'description' => $description,
            'image'       => $image,
            'sort_order'  => ($sort_order != '') ? (int)$sort_order : 0
        ];

        $this->Features_model->update_platform($id, $data);

        $this->session->set_flashdata('success', 'Platform berhasil diperbarui.');
        redirect('admin/features');
    }

    public function edit_item($id)
    {
        $data['title']         = 'Edit Fitur';
        $data['name']          = $this->session->userdata('name');
        $data['page_title']    = 'Edit Fitur';
        $data['page_subtitle'] = 'Perbarui data fitur';

        $data['item'] = $this->db
            ->where('id', $id)
            ->get('feature_items')
            ->row();

        if (!$data['item']) {
            show_404();
        }

        $data['platforms'] = $this->Features_model->get_platforms();

        $this->load->view('admin/features/edit_item', $data);
    }

    public function update_item($id)
    {
        $sort_order = $this->input->post('sort_order', TRUE);
        $data = [
            'platform_id' => $this->input->post('platform_id', TRUE),
            'title'       => $this->input->post('title', TRUE),
            'description' => $this->input->post('description', TRUE),
            'icon'        => $this->input->post('icon', TRUE),
            'sort_order'  => ($sort_order != '') ? (int)$sort_order : 0
        ];

        $this->Features_model->update_item($id, $data);

        $this->session->set_flashdata('success', 'Fitur berhasil diperbarui.');
        redirect('admin/features');
    }

    public function create_item($platform_id)
    {
        $data['title']         = 'Tambah Fitur';
        $data['name']          = $this->session->userdata('name');
        $data['page_title']    = 'Tambah Fitur';
        $data['page_subtitle'] = 'Buat fitur baru untuk platform';

        $data['platform'] = $this->Features_model->get_platform($platform_id);

        if (!$data['platform']) {
            show_404();
        }

        $data['platforms'] = $this->Features_model->get_platforms();

        $this->load->view('admin/features/create_item', $data);
    }

    public function store_item()
    {
        $sort_order = $this->input->post('sort_order', TRUE);
        $data = [
            'platform_id' => $this->input->post('platform_id', TRUE),
            'title'       => $this->input->post('title', TRUE),
            'description' => $this->input->post('description', TRUE),
            'icon'        => $this->input->post('icon', TRUE),
            'sort_order'  => ($sort_order != '') ? (int)$sort_order : 0
        ];

        $this->Features_model->insert_item($data);

        $this->session->set_flashdata('success', 'Fitur berhasil ditambahkan.');
        redirect('admin/features');
    }

    public function delete_item($id)
    {
        $item = $this->db
            ->where('id', $id)
            ->get('feature_items')
            ->row();

        if (!$item) {
            $this->session->set_flashdata('error', 'Fitur tidak ditemukan.');
            redirect('admin/features');
            return;
        }

        // Hapus icon jika bukan URL (misal file lokal)
        $this->_delete_image($item->icon);

        $this->Features_model->delete_item($id);

        $this->session->set_flashdata('success', 'Fitur berhasil dihapus.');
        redirect('admin/features');
    }

    public function delete_platform($id)
    {
        $platform = $this->Features_model->get_platform($id);

        if (!$platform) {
            $this->session->set_flashdata('error', 'Platform tidak ditemukan.');
            redirect('admin/features');
            return;
        }

        // Hapus gambar platform jika bukan URL
        $this->_delete_image($platform->image);

        // Hapus semua icon fitur yang berada di dalam platform (jika file lokal)
        $items = $this->Features_model->get_items($id);
        foreach ($items as $item) {
            $this->_delete_image($item->icon);
        }

        $this->Features_model->delete_platform($id);

        $this->session->set_flashdata('success', 'Platform dan seluruh fitur di dalamnya berhasil dihapus.');
        redirect('admin/features');
    }

    public function create_platform()
    {
        $data['title']         = 'Tambah Platform';
        $data['name']          = $this->session->userdata('name');
        $data['page_title']    = 'Tambah Platform';
        $data['page_subtitle'] = 'Buat platform baru untuk fitur';

        $this->load->view('admin/features/create_platform', $data);
    }

    public function store_platform()
    {
        $name        = $this->input->post('name', TRUE);
        $description = $this->input->post('description', TRUE);
        $sort_order  = $this->input->post('sort_order', TRUE);
        $image       = NULL;

        // Validasi
        $this->form_validation->set_rules('name', 'Nama Platform', 'required|trim');
        $this->form_validation->set_rules('sort_order', 'Urutan', 'integer|greater_than_equal_to[0]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/features/create_platform');
        }

        // Upload file
        if (!empty($_FILES['image']['name'])) {
            $config['upload_path']   = './uploads/platform/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png|webp';
            $config['max_size']      = 2048;
            $config['encrypt_name']  = TRUE;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('admin/features/create_platform');
            }
        }

        $data = [
            'name'        => $name,
            'description' => $description,
            'image'       => $image,
            'sort_order'  => ($sort_order != '') ? (int)$sort_order : 0
        ];

        $this->Features_model->insert_platform($data);

        $this->session->set_flashdata('success', 'Platform berhasil ditambahkan.');
        redirect('admin/features');
    }
}