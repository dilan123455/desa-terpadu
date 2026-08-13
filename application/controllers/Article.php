<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Article_model');
        $this->load->helper('url');
        $this->load->helper('text'); 
    }

    // Halaman Blog (List Artikel)
    public function index()
    {
        $data['title'] = 'Highlight Desa Terpadu';
        // Ambil 9 artikel terbaru yang sudah dipublish
        $data['articles'] = $this->Article_model->get_published(9);

        $this->load->view('site/layout/nav');
        $this->load->view('site/home/blog', $data);
        $this->load->view('site/layout/footer');
    }

    // Halaman Detail Artikel
    public function detail($slug)
    {
        $data['article'] = $this->Article_model->get_by_slug($slug);

        if (!$data['article']) {
            show_404();
        }

        $data['title'] = $data['article']->title;
        // Ambil 2 artikel terkait berdasarkan kategori
        $data['related_artikel'] = $this->Article_model->get_related($data['article']->category, $data['article']->id, 2);

        $this->load->view('site/layout/nav');
        $this->load->view('site/home/detail', $data);
        $this->load->view('site/layout/footer');
    }
}
?>