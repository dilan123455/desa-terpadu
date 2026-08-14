<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }

        $this->load->model('Contact_model');
        $this->load->helper(['url', 'form']);
    }

    public function index()
    {
        $data['title'] = 'Contact';
        $data['contact'] = $this->Contact_model->get_contact();

        $this->load->view(
            'admin/contact/index',
            $data
        );
    }

    public function edit($id)
    {
        $contact = $this->Contact_model->get_contact();

        if (!$contact) {
            show_404();
        }

        $data['title'] = 'Edit Contact';
        $data['contact'] = $contact;

        $this->load->view(
            'admin/contact/edit',
            $data
        );
    }

    public function update($id)
    {
        $phone = trim($this->input->post('phone', TRUE));
        $email = trim($this->input->post('email', TRUE));
        $address = trim($this->input->post('address', TRUE));
        $maps_url = trim($this->input->post('maps_url', TRUE));

        if ($phone === '' || $email === '' || $address === '') {

            $this->session->set_flashdata(
                'error',
                'Nomor telepon, email, dan alamat wajib diisi.'
            );

            redirect('admin/contact/edit/' . $id);
            return;
        }

        $data = [
            'phone'    => $phone,
            'email'    => $email,
            'address'  => $address,
            'maps_url' => $maps_url
        ];

        $this->Contact_model->update_contact($id, $data);

        $this->session->set_flashdata(
            'success',
            'Data contact berhasil diperbarui.'
        );

        redirect('admin/contact');
    }
}