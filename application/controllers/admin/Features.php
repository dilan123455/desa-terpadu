<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Features extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Features_model');
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
        $data = [
            'name'        => $this->input->post('name', true),
            'description' => $this->input->post('description'),
            'image'       => $this->input->post('image', true),
            'sort_order'  => $this->input->post('sort_order', true)
        ];

        $this->Features_model->update_platform($id, $data);

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
        $data = [
            'platform_id' => $this->input->post('platform_id', true),
            'title'       => $this->input->post('title', true),
            'description' => $this->input->post('description'),
            'icon'        => $this->input->post('icon', true),
            'sort_order'  => $this->input->post('sort_order', true)
        ];

        $this->Features_model->update_item($id, $data);

        redirect('admin/features');
    }


    /*
    |--------------------------------------------------------------------------
    | CREATE FITUR
    |--------------------------------------------------------------------------
    */

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
        $data = [
            'platform_id' => $this->input->post('platform_id', true),
            'title'       => $this->input->post('title', true),
            'description' => $this->input->post('description'),
            'icon'        => $this->input->post('icon', true),
            'sort_order'  => $this->input->post('sort_order', true)
        ];

        $this->Features_model->insert_item($data);

        $this->session->set_flashdata(
            'success',
            'Fitur berhasil ditambahkan.'
        );

        redirect('admin/features');
    }


    /*
    |--------------------------------------------------------------------------
    | DELETE FITUR
    |--------------------------------------------------------------------------
    */

    public function delete_item($id)
    {
        $item = $this->db
            ->where('id', $id)
            ->get('feature_items')
            ->row();

        if (!$item) {
            $this->session->set_flashdata(
                'error',
                'Fitur tidak ditemukan.'
            );

            redirect('admin/features');
            return;
        }

        $this->Features_model->delete_item($id);

        $this->session->set_flashdata(
            'success',
            'Fitur berhasil dihapus.'
        );

        redirect('admin/features');
    }


    /*
    |--------------------------------------------------------------------------
    | DELETE PLATFORM
    |--------------------------------------------------------------------------
    */

    public function delete_platform($id)
    {
        $platform = $this->Features_model->get_platform($id);

        if (!$platform) {
            $this->session->set_flashdata(
                'error',
                'Platform tidak ditemukan.'
            );

            redirect('admin/features');
            return;
        }

        $this->Features_model->delete_platform($id);

        $this->session->set_flashdata(
            'success',
            'Platform dan seluruh fitur di dalamnya berhasil dihapus.'
        );

        redirect('admin/features');
    }

    // create Platform

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
        $data = [
            'name'        => $this->input->post('name', true),
            'description' => $this->input->post('description'),
            'image'       => $this->input->post('image', true),
            'sort_order'  => $this->input->post('sort_order', true)
        ];

        $this->Features_model->insert_platform($data);

        $this->session->set_flashdata(
            'success',
            'Platform berhasil ditambahkan.'
        );

        redirect('admin/features');
    }
}