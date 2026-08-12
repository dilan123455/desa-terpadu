<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Contact_message_model');
        $this->load->helper(['url', 'form']);
    }

    public function index()
    {
        $data['title'] = 'Contact';

        $this->load->view('site/home/contact', $data);
    }

    public function send()
    {
        $name    = trim($this->input->post('name', TRUE));
        $email   = trim($this->input->post('email', TRUE));
        $phone   = trim($this->input->post('phone', TRUE));
        $subject = trim($this->input->post('subject', TRUE));
        $message = trim($this->input->post('message', FALSE));

        // Validasi sederhana
        if ($name === '' || $email === '' || $message === '') {

            $this->session->set_flashdata(
                'error',
                'Nama, email, dan pesan wajib diisi.'
            );

            redirect('contact');
            return;
        }

        // Simpan ke database
        $data = [
            'name'       => $name,
            'email'      => $email,
            'phone'      => $phone ?: NULL,
            'subject'    => $subject ?: NULL,
            'message'    => $message,
            'status'     => 'unread',
            'created_at' => date('Y-m-d H:i:s')
        ];

        $this->Contact_message_model->insert($data);

        $this->session->set_flashdata(
            'success',
            'Pesan berhasil dikirim. Terima kasih telah menghubungi kami.'
        );

        redirect('contact');
    }
}