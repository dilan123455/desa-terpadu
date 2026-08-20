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
        $data['title'] = 'Home';
        $data['name']  = $this->session->userdata('name');

        $data['hero'] =
            $this->Admin_home_model->get_hero();

        $data['challenges'] =
            $this->Admin_home_model->get_challenges();

        $this->load->view(
            'admin/home/index',
            $data
        );
    }


    /*
    |--------------------------------------------------------------------------
    | EDIT HERO
    |--------------------------------------------------------------------------
    */

    public function edit_hero()
    {
        $data['title'] = 'Edit Hero';
        $data['name']  = $this->session->userdata('name');

        $data['hero'] =
            $this->Admin_home_model->get_hero();

        if (!$data['hero']) {
            show_404();
        }

        $this->load->view(
            'admin/home/edit_hero',
            $data
        );
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
        $data['title'] = 'Edit Tantangan Desa';
        $data['name']  = $this->session->userdata('name');

        $data['challenge'] =
            $this->Admin_home_model->get_challenge($id);

        if (!$data['challenge']) {
            show_404();
        }

        $this->load->view(
            'admin/home/edit_challenge',
            $data
        );
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE CHALLENGE
    |--------------------------------------------------------------------------
    */

    public function update_challenge($id)
    {
        $data = [
            'title' => $this->input->post('title', TRUE)
        ];

        $this->Admin_home_model
             ->update_challenge($id, $data);

        $this->session->set_flashdata(
            'success',
            'Tantangan Desa berhasil diperbarui.'
        );

        redirect('admin/home');
    }

    /*
|--------------------------------------------------------------------------
| CREATE CHALLENGE
|--------------------------------------------------------------------------
*/

public function create_challenge()
{
    $data['title'] = 'Tambah Tantangan Desa';
    $data['name']  = $this->session->userdata('name');

    $this->load->view(
        'admin/home/create_challenge',
        $data
    );
}

/*
|--------------------------------------------------------------------------
| STORE CHALLENGE
|--------------------------------------------------------------------------
*/

public function store_challenge()
{
    $title = $this->input->post('title', TRUE);

    if (empty($title)) {
        $this->session->set_flashdata(
            'error',
            'Tantangan Desa wajib diisi.'
        );

        redirect('admin/home/create-challenge');
    }

    /*
    |--------------------------------------------------------------
    | Tentukan nomor urut berikutnya
    |--------------------------------------------------------------
    */

    $last = $this->db
        ->select_max('sort_order')
        ->get('home_challenges')
        ->row();

    $next_order = ((int) $last->sort_order) + 1;


    $data = [
        'title'      => $title,
        'sort_order' => $next_order
    ];


    $this->Admin_home_model
        ->create_challenge($data);


    $this->session->set_flashdata(
        'success',
        'Tantangan Desa berhasil ditambahkan.'
    );

    redirect('admin/home');
}

/*
|--------------------------------------------------------------------------
| DELETE CHALLENGE
|--------------------------------------------------------------------------
*/

public function delete_challenge($id)
{
    $challenge =
        $this->Admin_home_model->get_challenge($id);

    if (!$challenge) {
        show_404();
    }


    $this->Admin_home_model
         ->delete_challenge($id);


    $this->session->set_flashdata(
        'success',
        'Tantangan Desa berhasil dihapus.'
    );

    redirect('admin/home');
}
}