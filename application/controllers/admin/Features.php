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
        $data['title'] = 'Fitur Unggulan';

        $data['platforms'] =
            $this->Features_model->get_platforms();

        $data['items'] =
            $this->Features_model->get_all_items();

        $this->load->view('admin/features/index', $data);
    }

    public function edit_platform($id)
    {
        $data['title'] = 'Edit Platform';

        $data['platform'] =
            $this->Features_model->get_platform($id);

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
        $data['title'] = 'Edit Fitur';

        $data['item'] =
            $this->db
                ->where('id', $id)
                ->get('feature_items')
                ->row();

        if (!$data['item']) {
            show_404();
        }

        $data['platforms'] =
            $this->Features_model->get_platforms();

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
}