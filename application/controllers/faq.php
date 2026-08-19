<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        // Memuat model FAQ yang sudah Anda buat
        $this->load->model('Faq_model');
        // Tambahkan model kontak untuk footer
        $this->load->model('Contact_model');
    }

    public function index()
    {
        // Mengambil data FAQ yang berstatus 'active' dari database
        $data['faqs'] = $this->Faq_model->get_active();
        $data['title'] = 'FAQ - Desa Terpadu';

        // Ambil data kontak dari database
        $data['contact'] = $this->Contact_model->get_contact();

        // Memuat layout dan view FAQ (path: site/home/faq)
        $this->load->view('site/layout/nav');
        $this->load->view('site/home/faq', $data);
        // Kirim data kontak ke footer
        $this->load->view('site/layout/footer', ['contact' => $data['contact']]);
    }
}