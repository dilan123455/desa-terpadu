<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimoni extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Testimoni_model');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Testimoni';

        $data['testimonies'] = $this->Testimoni_model->get_active();

        $this->load->view('testimoni/index', $data);
    }
}