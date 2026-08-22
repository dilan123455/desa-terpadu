<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Article_model');
        $this->load->model('Contact_model');
        $this->load->model('Profile_model'); // Untuk favicon
        $this->load->helper(['url', 'text']);
    }

    // Halaman List Blog
    public function index()
    {
        $data['title'] = 'Highlight Desa Terpadu';
        $data['articles'] = $this->Article_model->get_published(9);
        $data['contact'] = $this->Contact_model->get_contact();

        // Favicon
        $site_logo = $this->Profile_model->get_logo_url();
        $data['favicon'] = !empty($site_logo) ? $site_logo : base_url('assets/logo2.png');

        // Load satu view full HTML
        $this->load->view('site/home/blog', $data);
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

        // Kontak untuk footer
        $data['contact'] = $this->Contact_model->get_contact();

        // Favicon
        $site_logo = $this->Profile_model->get_logo_url();
        $data['favicon'] = !empty($site_logo) ? $site_logo : base_url('assets/logo2.png');

        // Load satu view full HTML
        $this->load->view('site/home/detail', $data);
    }
}