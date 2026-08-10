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
        $data['name'] = $this->session->userdata('name');

        $this->load->view('admin/dashboard', $data);
    }
}