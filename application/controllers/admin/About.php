<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Load model
        $this->load->model('About_model');

        // Load library yang dibutuhkan
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    /**
     * Helper: Mendapatkan urutan berikutnya (max + 1) dari sebuah tabel
     */
    private function get_next_sort_order($table)
    {
        $this->db->select_max('sort_order');
        $query = $this->db->get($table);
        $row = $query->row();
        return ($row && $row->sort_order !== null) ? $row->sort_order + 1 : 1;
    }

    /**
     * Mengambil semua sort_order yang sudah dipakai (kecuali exclude_id)
     */
    private function get_occupied_sort_orders($table, $exclude_id = null)
    {
        $this->db->select('sort_order');
        $this->db->where('sort_order IS NOT NULL');
        if ($exclude_id !== null) {
            $this->db->where('id !=', $exclude_id);
        }
        $query = $this->db->get($table);
        $result = [];
        foreach ($query->result() as $row) {
            $result[] = (int) $row->sort_order;
        }
        return $result;
    }

    /**
     * Mencari nomor kosong terdekat dari target (bisa naik atau turun)
     */
    private function find_nearest_free_sort_order($target, $occupied)
    {
        $target = (int) $target;
        if (!in_array($target, $occupied)) {
            return $target;
        }

        // Cari ke atas
        $up = $target + 1;
        while (in_array($up, $occupied)) {
            $up++;
        }

        // Cari ke bawah
        $down = $target - 1;
        while ($down >= 1 && in_array($down, $occupied)) {
            $down--;
        }

        // Jika tidak ada nomor di bawah (down < 1), pilih atas
        if ($down < 1) {
            return $up;
        }

        // Bandingkan jarak, pilih yang lebih dekat. Jika sama, pilih yang lebih kecil (menurun)
        if (($target - $down) <= ($up - $target)) {
            return $down;
        } else {
            return $up;
        }
    }

    /**
     * Memindahkan record yang bentrok ke nomor kosong terdekat
     */
    private function move_conflicting_record($table, $sort_order, $exclude_id = null)
    {
        $this->db->where('sort_order', $sort_order);
        if ($exclude_id !== null) {
            $this->db->where('id !=', $exclude_id);
        }
        $query = $this->db->get($table);
        $conflict = $query->row();

        if (!$conflict) {
            return;
        }

        $occupied = $this->get_occupied_sort_orders($table, $exclude_id);
        $free = $this->find_nearest_free_sort_order($sort_order, $occupied);

        $this->db->where('id', $conflict->id)->update($table, ['sort_order' => $free]);
    }

    public function index()
    {
        $data['title']         = 'About';
        $data['name']          = $this->session->userdata('name');
        $data['page_title']    = 'About';
        $data['page_subtitle'] = 'Kelola informasi tentang Desa Terpadu';

        $data['about'] = $this->About_model->get_about();
        $data['slides'] = $this->About_model->get_slides();
        $data['benefits'] = $this->About_model->get_benefits();

        $this->load->view('admin/about/index', $data);
    }

    public function store()
    {
        $about = $this->About_model->get_about();

        if (!empty($about)) {
            redirect('admin/about/edit');
        }

        $data = array(
            'title'       => $this->input->post('title', TRUE),
            'description' => $this->input->post('description', TRUE)
        );

        $this->About_model->insert_about($data);

        $this->session->set_flashdata('success', 'Informasi About berhasil ditambahkan.');
        redirect('admin/about');
    }

    public function edit()
    {
        $data['title']         = 'Edit About';
        $data['name']          = $this->session->userdata('name');
        $data['page_title']    = 'Edit About';
        $data['page_subtitle'] = 'Perbarui informasi tentang Desa Terpadu';
        $data['about']         = $this->About_model->get_about();

        if (empty($data['about'])) {
            $this->session->set_flashdata('error', 'Data About belum tersedia. Silakan tambahkan terlebih dahulu.');
            redirect('admin/about');
        }

        $this->load->view('admin/about/edit', $data);
    }

    public function update()
    {
        $about = $this->About_model->get_about();

        if (empty($about)) {
            $this->session->set_flashdata('error', 'Data About belum tersedia.');
            redirect('admin/about');
        }

        $data = array(
            'title'       => $this->input->post('title', TRUE),
            'description' => $this->input->post('description', TRUE)
        );

        $this->About_model->update_about($about->id, $data);

        $this->session->set_flashdata('success', 'Informasi About berhasil diperbarui.');
        redirect('admin/about');
    }

    // ==================== SLIDE ====================

    public function slide_create()
    {
        $data['title']         = 'Tambah Slide About';
        $data['name']          = $this->session->userdata('name');
        $data['page_title']    = 'Tambah Slide About';
        $data['page_subtitle'] = 'Buat slide baru untuk About';

        $this->load->view('admin/about/slide_create', $data);
    }

    public function slide_store()
    {
        $image = '';

        if (!empty($_FILES['image']['name'])) {

            $config['upload_path'] = './assets/uploads/about/';
            $config['allowed_types'] = 'jpg|jpeg|png|webp';
            $config['max_size'] = 5120;
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('admin/about/slide_create');
            }

            $upload = $this->upload->data();
            $image = $upload['file_name'];
        }

        $sort_order = $this->input->post('sort_order', TRUE);
        if (empty($sort_order)) {
            $sort_order = $this->get_next_sort_order('about_slides');
        }

        // Pindahkan record yang bentrok (jika ada)
        $this->move_conflicting_record('about_slides', $sort_order);

        $data = array(
            'title'      => $this->input->post('title', TRUE),
            'image'      => $image,
            'sort_order' => $sort_order
        );

        $this->db->insert('about_slides', $data);

        $this->session->set_flashdata('success', 'Slide berhasil ditambahkan.');
        redirect('admin/about');
    }

    public function edit_slide($id)
    {
        $data['title']         = 'Edit Slide About';
        $data['name']          = $this->session->userdata('name');
        $data['page_title']    = 'Edit Slide About';
        $data['page_subtitle'] = 'Perbarui slide About';
        $data['slide']         = $this->About_model->get_slide_by_id($id);

        if (empty($data['slide'])) {
            show_404();
        }

        $this->load->view('admin/about/edit_slide', $data);
    }

    public function update_slide($id)
    {
        $slide = $this->About_model->get_slide_by_id($id);

        if (empty($slide)) {
            show_404();
        }

        $old_sort_order = $slide->sort_order;
        $new_sort_order = $this->input->post('sort_order', TRUE);
        if (empty($new_sort_order)) {
            $new_sort_order = $this->get_next_sort_order('about_slides');
        }

        // Jika urutan berubah, pindahkan record bentrok
        if ($new_sort_order != $old_sort_order) {
            $this->move_conflicting_record('about_slides', $new_sort_order, $id);
        }

        $data = array(
            'title'      => $this->input->post('title', TRUE),
            'sort_order' => $new_sort_order
        );

        // Upload gambar jika ada
        if (!empty($_FILES['image']['name'])) {

            $config['upload_path']   = './assets/uploads/about/';
            $config['allowed_types'] = 'jpg|jpeg|png|webp';
            $config['max_size']      = 5120;
            $config['file_name']     = time() . '_' . $_FILES['image']['name'];

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('admin/about/edit_slide/' . $id);
            }

            $upload = $this->upload->data();
            $new_image = $upload['file_name'];

            // Hapus gambar lama jika ada
            if (!empty($slide->image)) {
                $old_file_path = FCPATH . 'assets/uploads/about/' . $slide->image;
                if (file_exists($old_file_path)) {
                    @unlink($old_file_path);
                }
            }

            $data['image'] = $new_image;
        }

        $this->About_model->update_slide($id, $data);

        $this->session->set_flashdata('success', 'Slide berhasil diperbarui.');
        redirect('admin/about');
    }

    public function slide_delete($id)
    {
        $slide = $this->About_model->get_slide_by_id($id);

        if (!empty($slide)) {
            // Hapus file gambar dari folder jika ada
            if (!empty($slide->image)) {
                $file_path = FCPATH . 'assets/uploads/about/' . $slide->image;
                if (file_exists($file_path)) {
                    @unlink($file_path);
                }
            }

            $this->About_model->delete_slide($id);
            $this->session->set_flashdata('success', 'Slide berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Slide tidak ditemukan.');
        }

        redirect('admin/about');
    }

    // ==================== BENEFITS ====================

    public function benefit_create()
    {
        $data['title']         = 'Tambah Manfaat';
        $data['name']          = $this->session->userdata('name');
        $data['page_title']    = 'Tambah Manfaat';
        $data['page_subtitle'] = 'Buat manfaat baru';

        $this->load->view('admin/about/benefits/create', $data);
    }

    public function benefit_store()
    {
        $this->form_validation->set_rules('title', 'Judul Manfaat', 'required');
        $this->form_validation->set_rules('description', 'Deskripsi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/about/benefit_create');
        }

        $sort_order = $this->input->post('sort_order', TRUE);
        if (empty($sort_order)) {
            $sort_order = $this->get_next_sort_order('about_benefits');
        }

        // Pindahkan record yang bentrok (jika ada)
        $this->move_conflicting_record('about_benefits', $sort_order);

        $data = array(
            'title'       => $this->input->post('title', TRUE),
            'description' => $this->input->post('description', TRUE),
            'sort_order'  => $sort_order
        );

        $this->About_model->insert_benefit($data);

        $this->session->set_flashdata('success', 'Manfaat berhasil ditambahkan.');
        redirect('admin/about');
    }

    public function benefit_edit($id)
    {
        $benefit = $this->About_model->get_benefit_by_id($id);

        if (empty($benefit)) {
            show_404();
        }

        $data['title']         = 'Edit Manfaat';
        $data['name']          = $this->session->userdata('name');
        $data['page_title']    = 'Edit Manfaat';
        $data['page_subtitle'] = 'Perbarui manfaat';
        $data['benefit']       = $benefit;

        $this->load->view('admin/about/benefits/edit', $data);
    }

    public function benefit_update($id)
    {
        $benefit = $this->About_model->get_benefit_by_id($id);

        if (empty($benefit)) {
            show_404();
        }

        $this->form_validation->set_rules('title', 'Judul Manfaat', 'required');
        $this->form_validation->set_rules('description', 'Deskripsi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/about/benefit_edit/' . $id);
        }

        $old_sort_order = $benefit->sort_order;
        $new_sort_order = $this->input->post('sort_order', TRUE);
        if (empty($new_sort_order)) {
            $new_sort_order = $this->get_next_sort_order('about_benefits');
        }

        // Jika urutan berubah, pindahkan record bentrok
        if ($new_sort_order != $old_sort_order) {
            $this->move_conflicting_record('about_benefits', $new_sort_order, $id);
        }

        $data = array(
            'title'       => $this->input->post('title', TRUE),
            'description' => $this->input->post('description', TRUE),
            'sort_order'  => $new_sort_order
        );

        $this->About_model->update_benefit($id, $data);

        $this->session->set_flashdata('success', 'Manfaat berhasil diperbarui.');
        redirect('admin/about');
    }

    public function benefit_delete($id)
    {
        $benefit = $this->About_model->get_benefit_by_id($id);

        if (empty($benefit)) {
            show_404();
        }

        $this->About_model->delete_benefit($id);

        $this->session->set_flashdata('success', 'Manfaat berhasil dihapus.');
        redirect('admin/about');
    }
}