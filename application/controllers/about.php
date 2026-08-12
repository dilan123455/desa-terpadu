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
        $data['slides'] = $this->About_model->get_slides();
        $data['benefits'] = $this->About_model->get_benefits();

        $this->load->view('site/home/about', $data);
    }
}