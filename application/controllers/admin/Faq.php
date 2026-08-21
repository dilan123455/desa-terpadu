<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata(
                'error',
                'Silakan login terlebih dahulu.'
            );
            redirect('auth/login');
        }

        $this->load->model('Faq_model');
        $this->load->helper('url');
        $this->load->helper('text');
    }

    public function index()
    {
        $data['title']         = 'FAQ';
        $data['name']          = $this->session->userdata('name');
        $data['page_title']    = 'FAQ';
        $data['page_subtitle'] = 'Kelola pertanyaan dan jawaban yang sering ditanyakan';
        $data['faqs']          = $this->Faq_model->get_all();

        $this->load->view('admin/faq/index', $data);
    }

    public function create()
    {
        $data['title']         = 'Tambah FAQ';
        $data['name']          = $this->session->userdata('name');
        $data['page_title']    = 'Tambah FAQ';
        $data['page_subtitle'] = 'Buat pertanyaan dan jawaban baru';

        $this->load->view('admin/faq/create', $data);
    }

    public function store()
    {
        $question   = trim($this->input->post('question', TRUE));
        $answer     = trim($this->input->post('answer', FALSE));
        $status     = $this->input->post('status', TRUE);
        $sort_order = (int) $this->input->post('sort_order');

        if ($question === '' || $answer === '') {
            $this->session->set_flashdata(
                'error',
                'Pertanyaan dan jawaban wajib diisi.'
            );

            redirect('admin/faq/create');
            return;
        }

        $data = [
            'question'    => $question,
            'answer'      => $answer,
            'status'      => ($status === 'inactive') ? 'inactive' : 'active',
            'sort_order'  => $sort_order,
            'created_at'  => date('Y-m-d H:i:s'),
            'updated_at'  => date('Y-m-d H:i:s')
        ];

        $this->Faq_model->insert($data);

        $this->session->set_flashdata(
            'success',
            'FAQ berhasil ditambahkan.'
        );

        redirect('admin/faq');
    }

    public function edit($id)
    {
        $faq = $this->Faq_model->get_by_id($id);

        if (!$faq) {
            show_404();
        }

        $data['title']         = 'Edit FAQ';
        $data['name']          = $this->session->userdata('name');
        $data['page_title']    = 'Edit FAQ';
        $data['page_subtitle'] = 'Perbarui pertanyaan dan jawaban';
        $data['faq']           = $faq;

        $this->load->view('admin/faq/edit', $data);
    }

    public function detail($id)
    {
        $faq = $this->Faq_model->get_by_id($id);

        if (!$faq) {
            show_404();
        }

        $data['title']         = 'Detail FAQ';
        $data['name']          = $this->session->userdata('name');
        $data['page_title']    = 'Detail FAQ';
        $data['page_subtitle'] = 'Lihat detail pertanyaan dan jawaban';
        $data['faq']           = $faq;

        $this->load->view('admin/faq/detail', $data);
    }

    public function update($id)
    {
        $faq = $this->Faq_model->get_by_id($id);

        if (!$faq) {
            show_404();
        }

        $question   = trim($this->input->post('question', TRUE));
        $answer     = trim($this->input->post('answer', FALSE));
        $status     = $this->input->post('status', TRUE);
        $sort_order = (int) $this->input->post('sort_order');

        if ($question === '' || $answer === '') {
            $this->session->set_flashdata(
                'error',
                'Pertanyaan dan jawaban wajib diisi.'
            );

            redirect('admin/faq/edit/' . $id);
            return;
        }

        $data = [
            'question'    => $question,
            'answer'      => $answer,
            'status'      => ($status === 'inactive') ? 'inactive' : 'active',
            'sort_order'  => $sort_order,
            'updated_at'  => date('Y-m-d H:i:s')
        ];

        $this->Faq_model->update($id, $data);

        $this->session->set_flashdata(
            'success',
            'FAQ berhasil diperbarui.'
        );

        redirect('admin/faq');
    }

    public function delete($id)
    {
        $faq = $this->Faq_model->get_by_id($id);

        if (!$faq) {
            show_404();
        }

        $this->Faq_model->delete($id);

        $this->session->set_flashdata(
            'success',
            'FAQ berhasil dihapus.'
        );

        redirect('admin/faq');
    }
}