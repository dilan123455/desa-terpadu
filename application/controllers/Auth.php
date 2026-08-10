<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('User_model');
        $this->load->library('session');
    }

    public function login()
    {
        if ($this->session->userdata('logged_in')) {
            redirect('admin/dashboard');
        }

        $this->load->view('auth/login');
    }

    public function process_login()
    {
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password');

        $user = $this->User_model->get_by_username($username);

        if ($user && password_verify($password, $user->password)) {

            $session_data = [
                'user_id'    => $user->id,
                'username'   => $user->username,
                'name'       => $user->name,
                'role'       => $user->role,
                'logged_in'  => TRUE
            ];

            $this->session->set_userdata($session_data);

            redirect('admin/dashboard');

        } else {

            $this->session->set_flashdata(
                'error',
                'Username atau password salah.'
            );

            redirect('auth/login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();

        redirect('auth/login');
    }
}