<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Cek apakah user sudah login
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['name']  = $this->session->userdata('name');

        // Load model
        $this->load->model('Article_model');
        $this->load->model('Testimoni_model');
        $this->load->model('Faq_model');

        // Ambil total data untuk statistik
        $data['total_articles']     = $this->Article_model->count_all();
        $data['total_testimonials'] = $this->Testimoni_model->count_all();
        $data['total_faqs']         = $this->Faq_model->count_all();

        $this->load->view('admin/dashboard', $data);
    }
}