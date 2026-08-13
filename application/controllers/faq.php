<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        // 1. Memuat model FAQ yang sudah Anda buat
        $this->load->model('Faq_model');
    }

    public function index()
    {
        // 2. Mengambil data FAQ yang berstatus 'active' dari database
        $data['faqs'] = $this->Faq_model->get_active();
        $data['title'] = 'FAQ - Desa Terpadu';

        // 3. Memuat layout dan view FAQ (path: site/home/faq)
        $this->load->view('site/layout/nav');
        $this->load->view('site/home/faq', $data);
        $this->load->view('site/layout/footer');
    }
}