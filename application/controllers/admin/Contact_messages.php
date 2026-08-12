<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_messages extends CI_Controller
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

    $this->load->model('Contact_message_model');

    $this->load->helper([
        'url',
        'text'
    ]);
}

    public function index()
    {
        $data['title'] = 'Pesan Masuk';
        $data['messages'] = $this->Contact_message_model->get_all();

        $this->load->view(
            'admin/contact_messages/index',
            $data
        );
    }

    public function detail($id)
    {
        $message = $this->Contact_message_model->get_by_id($id);

        if (!$message) {
            show_404();
        }

        // Jika pesan masih unread,
        // otomatis ubah menjadi read ketika dibuka.
        if ($message->status === 'unread') {
            $this->Contact_message_model->update_status(
                $id,
                'read'
            );

            $message->status = 'read';
        }

        $data['title'] = 'Detail Pesan';
        $data['message'] = $message;

        $this->load->view(
            'admin/contact_messages/detail',
            $data
        );
    }

    public function mark_read($id)
    {
        $message = $this->Contact_message_model->get_by_id($id);

        if (!$message) {
            show_404();
        }

        $this->Contact_message_model->update_status(
            $id,
            'read'
        );

        $this->session->set_flashdata(
            'success',
            'Pesan ditandai sudah dibaca.'
        );

        redirect('admin/contact_messages');
    }

    public function mark_replied($id)
    {
        $message = $this->Contact_message_model->get_by_id($id);

        if (!$message) {
            show_404();
        }

        $this->Contact_message_model->update_status(
            $id,
            'replied'
        );

        $this->session->set_flashdata(
            'success',
            'Pesan ditandai sudah dibalas.'
        );

        redirect('admin/contact_messages');
    }

    public function delete($id)
    {
        $message = $this->Contact_message_model->get_by_id($id);

        if (!$message) {
            show_404();
        }

        $this->Contact_message_model->delete($id);

        $this->session->set_flashdata(
            'success',
            'Pesan berhasil dihapus.'
        );

        redirect('admin/contact_messages');
    }


    }