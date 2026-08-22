<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Faq_model');
        $this->load->model('Contact_model');
        $this->load->model('Profile_model'); // Tambahan untuk favicon
    }

    public function index()
    {
        // Ambil data FAQ aktif
        $data['faqs'] = $this->Faq_model->get_active();
        $data['title'] = 'FAQ - Desa Terpadu';

        // Ambil data kontak untuk footer
        $data['contact'] = $this->Contact_model->get_contact();

        // Favicon dinamis dari logo admin
        $site_logo = $this->Profile_model->get_logo_url();
        $data['favicon'] = !empty($site_logo) ? $site_logo : base_url('assets/logo2.png');

        // Load satu view full HTML (nav, konten, footer sudah di dalam view)
        $this->load->view('site/home/faq', $data);
    }
}