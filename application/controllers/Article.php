<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Article_model');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Artikel';

        $data['articles'] = $this->Article_model->get_published();

        $this->load->view('articles/index', $data);
    }

    public function detail($slug)
    {
        $data['article'] = $this->Article_model->get_by_slug($slug);

        if (!$data['article']) {
            show_404();
        }

        $data['title'] = $data['article']->title;

        $this->load->view('articles/detail', $data);
    }
}