<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $this->load->model('Testimoni_model');
        $this->load->model('Article_model');

        // Testimoni aktif
        $data['testimonials'] = $this->Testimoni_model->get_active();

        // Artikel yang sudah dipublikasikan
        $data['articles'] = $this->Article_model->get_published();

        $this->load->view('site/home', $data);
    }
}