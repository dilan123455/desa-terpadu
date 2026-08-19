<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Article_model');
        $this->load->model('Contact_model'); // Tambahkan model kontak
        $this->load->helper(['url', 'text']);
    }

    // Halaman List Blog
    public function index()
    {
        $data['title'] = 'Highlight Desa Terpadu';
        // Ambil 9 artikel terbaru
        $data['articles'] = $this->Article_model->get_published(9);
        // Ambil data kontak untuk footer
        $data['contact'] = $this->Contact_model->get_contact();

        $this->load->view('site/layout/nav');
        $this->load->view('site/home/blog', $data);
        // Kirim data kontak ke footer
        $this->load->view('site/layout/footer', ['contact' => $data['contact']]);
    }

    // Halaman Detail Blog
    public function detail($slug)
    {
        $data['article'] = $this->Article_model->get_by_slug($slug);

        if (!$data['article']) {
            show_404();
        }

        $article = $data['article'];

        $data['title'] = $article->title;

        // Related posts berdasarkan kategori
        $data['related_artikel'] = $this->Article_model->get_related(
            $article->category,
            $article->id,
            2
        );

        // Previous & Next Artikel
        $data['prev_article'] = $this->Article_model->get_prev_article($article->id);
        $data['next_article'] = $this->Article_model->get_next_article($article->id);

        // Ambil data kontak untuk footer
        $data['contact'] = $this->Contact_model->get_contact();

        $this->load->view('site/layout/nav');
        $this->load->view('site/home/detail', $data);
        // Kirim data kontak ke footer
        $this->load->view('site/layout/footer', ['contact' => $data['contact']]);
    }
}