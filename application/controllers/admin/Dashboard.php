<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
        
        $this->load->model('Implementation_model');


        $this->load->database();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['name']  = $this->session->userdata('name');

        // ==========================================
        // STATISTIK DASHBOARD
        // ==========================================

        // Artikel
        $data['total_articles'] = $this->db
            ->count_all('articles');

        // Testimoni
        $data['total_testimonials'] = $this->db
            ->count_all('testimonials');

        // FAQ
        $data['total_faqs'] = $this->db
            ->count_all('faqs');

        // Implementation
       $data['total_implementation'] =
    $this->Implementation_model->count_all();

        $this->load->view(
            'admin/dashboard',
            $data
        );
    }
}