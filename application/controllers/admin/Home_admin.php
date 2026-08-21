<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Cek login
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }

        $this->load->model('Admin_home_model');
    }


    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $data['title']         = 'Home';
        $data['name']          = $this->session->userdata('name');
        $data['page_title']    = 'Home';
        $data['page_subtitle'] = 'Kelola konten halaman utama website';

        $data['hero']       = $this->Admin_home_model->get_hero();
        $data['challenges'] = $this->Admin_home_model->get_challenges();

        $this->load->view('admin/home/index', $data);
    }


    /*
    |--------------------------------------------------------------------------
    | EDIT HERO
    |--------------------------------------------------------------------------
    */

    public function edit_hero()
    {
        $data['title']         = 'Edit Hero';
        $data['name']          = $this->session->userdata('name');
        $data['page_title']    = 'Edit Hero';
        $data['page_subtitle'] = 'Perbarui konten hero utama';

        $data['hero'] = $this->Admin_home_model->get_hero();

        if (!$data['hero']) {
            show_404();
        }

        $this->load->view('admin/home/edit_hero', $data);
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE HERO
    |--------------------------------------------------------------------------
    */

    public function update_hero()
    {
        $id = $this->input->post('id');

        $data = [
            'tagline'     => $this->input->post('tagline', TRUE),
            'title'       => $this->input->post('title', TRUE),
            'description' => $this->input->post('description', TRUE),
            'image'       => $this->input->post('image', TRUE)
        ];

        $this->Admin_home_model->update_hero($id, $data);

        $this->session->set_flashdata(
            'success',
            'Konten Hero berhasil diperbarui.'
        );

        redirect('admin/home');
    }


    /*
    |--------------------------------------------------------------------------
    | EDIT CHALLENGE
    |--------------------------------------------------------------------------
    */

    public function edit_challenge($id)
    {
        $data['title']         = 'Edit Tantangan Desa';
        $data['name']          = $this->session->userdata('name');
        $data['page_title']    = 'Edit Tantangan Desa';
        $data['page_subtitle'] = 'Perbarui tantangan desa';

        $data['challenge'] = $this->Admin_home_model->get_challenge($id);

        if (!$data['challenge']) {
            show_404();
        }

        $this->load->view('admin/home/edit_challenge', $data);
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE CHALLENGE (dengan reorder otomatis)
    |--------------------------------------------------------------------------
    */

    public function update_challenge($id)
    {
        $title      = $this->input->post('title', TRUE);
        $sort_order = $this->input->post('sort_order', TRUE);

        // Validasi title
        if (empty($title)) {
            $this->session->set_flashdata('error', 'Tantangan Desa wajib diisi.');
            redirect('admin/home/edit-challenge/' . $id);
        }

        // Validasi sort_order
        if (empty($sort_order) || !is_numeric($sort_order) || $sort_order < 1) {
            $this->session->set_flashdata('error', 'Urutan harus angka minimal 1.');
            redirect('admin/home/edit-challenge/' . $id);
        }

        $data = [
            'title'      => $title,
            'sort_order' => (int) $sort_order
        ];

        $updated = $this->Admin_home_model->update_challenge_with_order($id, $data);

        if (!$updated) {
            $this->session->set_flashdata('error', 'Gagal memperbarui tantangan.');
            redirect('admin/home/edit-challenge/' . $id);
        }

        $this->session->set_flashdata('success', 'Tantangan Desa berhasil diperbarui.');
        redirect('admin/home');
    }


    /*
    |--------------------------------------------------------------------------
    | CREATE CHALLENGE
    |--------------------------------------------------------------------------
    */

    public function create_challenge()
    {
        $data['title']         = 'Tambah Tantangan Desa';
        $data['name']          = $this->session->userdata('name');
        $data['page_title']    = 'Tambah Tantangan Desa';
        $data['page_subtitle'] = 'Buat tantangan desa baru';

        $this->load->view('admin/home/create_challenge', $data);
    }


    /*
    |--------------------------------------------------------------------------
    | STORE CHALLENGE (urutan otomatis)
    |--------------------------------------------------------------------------
    */

    public function store_challenge()
    {
        $title = $this->input->post('title', TRUE);

        if (empty($title)) {
            $this->session->set_flashdata('error', 'Tantangan Desa wajib diisi.');
            redirect('admin/home/create-challenge');
        }

        // Urutan otomatis: nilai maksimum + 1
        $next_order = $this->Admin_home_model->get_next_sort_order();

        $data = [
            'title'      => $title,
            'sort_order' => $next_order
        ];

        $this->Admin_home_model->create_challenge($data);

        $this->session->set_flashdata('success', 'Tantangan Desa berhasil ditambahkan.');
        redirect('admin/home');
    }


    /*
    |--------------------------------------------------------------------------
    | DELETE CHALLENGE
    |--------------------------------------------------------------------------
    */

    public function delete_challenge($id)
    {
        $challenge = $this->Admin_home_model->get_challenge($id);

        if (!$challenge) {
            show_404();
        }

        $this->Admin_home_model->delete_challenge($id);

        $this->session->set_flashdata('success', 'Tantangan Desa berhasil dihapus.');
        redirect('admin/home');
    }
}