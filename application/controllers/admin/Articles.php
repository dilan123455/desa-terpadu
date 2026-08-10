<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articles extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }

        $this->load->model('Article_model');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Artikel';
        $data['articles'] = $this->Article_model->get_all();

        $this->load->view('admin/articles/index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Artikel';

        $this->load->view('admin/articles/create', $data);
    }

    public function store()
    {
        $title    = $this->input->post('title', TRUE);
        $category = $this->input->post('category', TRUE);
        $content  = $this->input->post('content', FALSE);
        $status   = $this->input->post('status', TRUE);

        $slug = url_title($title, 'dash', TRUE);

        $data = [
            'title'        => $title,
            'slug'         => $slug,
            'category'     => $category,
            'content'      => $content,
            'author_id'    => $this->session->userdata('user_id'),
            'status'       => $status,
            'published_at' => ($status === 'published') ? date('Y-m-d H:i:s') : NULL
        ];

        $this->Article_model->insert($data);

        $this->session->set_flashdata(
            'success',
            'Artikel berhasil ditambahkan.'
        );

        redirect('admin/articles');
    }

    public function edit($id)
{
    $article = $this->Article_model->get_by_id($id);

    if (!$article) {
        show_404();
    }

    $data['title'] = 'Edit Artikel';
    $data['article'] = $article;

    $this->load->view('admin/articles/edit', $data);
}

public function update($id)
{
    $article = $this->Article_model->get_by_id($id);

    if (!$article) {
        show_404();
    }

    $title    = $this->input->post('title', TRUE);
    $category = $this->input->post('category', TRUE);
    $content  = $this->input->post('content', FALSE);
    $status   = $this->input->post('status', TRUE);

    $slug = url_title($title, 'dash', TRUE);

    $data = [
        'title'        => $title,
        'slug'         => $slug,
        'category'     => $category,
        'content'      => $content,
        'status'       => $status,
        'published_at' => ($status === 'published')
            ? ($article->published_at ?: date('Y-m-d H:i:s'))
            : NULL
    ];

    $this->Article_model->update($id, $data);

    $this->session->set_flashdata(
        'success',
        'Artikel berhasil diperbarui.'
    );

    redirect('admin/articles');
}

public function delete($id)
{
    $article = $this->Article_model->get_by_id($id);

    if (!$article) {
        show_404();
    }

    $this->Article_model->delete($id);

    $this->session->set_flashdata(
        'success',
        'Artikel berhasil dihapus.'
    );

    redirect('admin/articles');
}
    
}