<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('About_model');
    }

    public function index()
    {
        $data['title'] = 'Tentang Desa Terpadu';
        $data['about'] = $this->About_model->get_about();

        $this->load->view('admin/about/index', $data);
    }





    public function store()
    {
        // Cegah pembuatan data kedua
        $about = $this->About_model->get_about();

        if (!empty($about)) {
            redirect('admin/about/edit');
        }

        $data = array(
            'title'       => $this->input->post('title', TRUE),
            'description' => $this->input->post('description', TRUE)
        );

        $this->About_model->insert_about($data);

        redirect('admin/about');
    }


    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */

    public function edit()
    {
        $data['title'] = 'Edit Tentang Desa Terpadu';
        $data['about'] = $this->About_model->get_about();

        // Kalau belum ada data, arahkan ke Create
        if (empty($data['about'])) {
            redirect('admin/about/create');
        }

        $this->load->view('admin/about/edit', $data);
    }


    public function update()
    {
        $about = $this->About_model->get_about();

        if (empty($about)) {
            redirect('admin/about/create');
        }

        $data = array(
            'title'       => $this->input->post('title', TRUE),
            'description' => $this->input->post('description', TRUE)
        );

        $this->About_model->update_about($about->id, $data);

        redirect('admin/about');
    }
}