<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        // Load model testimoni dan artikel
        $this->load->model('Testimoni_model');
        $this->load->model('Article_model');
    }

    public function index()
    {
        // Ambil data testimoni aktif
        $data['testi_data'] = $this->Testimoni_model->get_active();
        
        // Ambil 6 artikel terbaru yang sudah dipublish
        $data['articles'] = $this->Article_model->get_published(6);

        $this->load->view('site/home', $data);
    }
}