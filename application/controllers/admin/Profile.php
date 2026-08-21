<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }

        $this->load->model('Profile_model');
    }

    public function index()
    {
        $user_id = $this->session->userdata('user_id');
        $user = $this->Profile_model->get_user($user_id);

        if (!$user) {
            $this->session->set_flashdata('error', 'Data administrator tidak ditemukan.');
            redirect('admin/dashboard');
            return;
        }

        $data['title'] = 'Profil';
        $data['name'] = $user->name;
        $data['email'] = $user->email;
        $data['logo'] = $this->Profile_model->get_logo_url();

        $this->load->view('admin/profile/index', $data);
    }

    public function update()
    {
        $user_id = $this->session->userdata('user_id');
        $name = trim($this->input->post('name', TRUE));
        $email = trim($this->input->post('email', TRUE));

        if ($name === '') {
            $this->session->set_flashdata('error', 'Nama wajib diisi.');
            redirect('admin/profile');
            return;
        }

        if ($email === '') {
            $this->session->set_flashdata('error', 'Email wajib diisi.');
            redirect('admin/profile');
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->session->set_flashdata('error', 'Format email tidak valid.');
            redirect('admin/profile');
            return;
        }

        $email_exists = $this->db
            ->where('email', $email)
            ->where('id !=', $user_id)
            ->get('users')
            ->row();

        if ($email_exists) {
            $this->session->set_flashdata('error', 'Email tersebut sudah digunakan oleh administrator lain.');
            redirect('admin/profile');
            return;
        }

        $update_data = [
            'name'  => $name,
            'email' => $email
        ];

        $updated = $this->Profile_model->update_user($user_id, $update_data);

        if (!$updated) {
            $this->session->set_flashdata('error', 'Profil gagal diperbarui.');
            redirect('admin/profile');
            return;
        }

        $this->session->set_userdata([
            'name'  => $name,
            'email' => $email
        ]);

        $this->session->set_flashdata('success', 'Profil berhasil diperbarui.');
        redirect('admin/profile');
    }

    public function update_logo()
{
    if (
        !isset($_FILES['logo']) ||
        $_FILES['logo']['error'] === UPLOAD_ERR_NO_FILE
    ) {
        $this->session->set_flashdata('error', 'Silakan pilih gambar logo terlebih dahulu.');
        redirect('admin/profile');
        return;
    }

    $upload_path = FCPATH . 'assets/uploads/logo/';

    if (!is_dir($upload_path)) {
        mkdir($upload_path, 0755, true);
    }

    $config['upload_path'] = $upload_path;
    $config['allowed_types'] = 'jpg|jpeg|png|webp';
    $config['max_size'] = 5024;
    $config['file_name'] = pathinfo($_FILES['logo']['name'], PATHINFO_FILENAME);
    $config['overwrite'] = FALSE;
    $config['remove_spaces'] = TRUE;

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('logo')) {
        $this->session->set_flashdata('error', strip_tags($this->upload->display_errors()));
        redirect('admin/profile');
        return;
    }

    $upload_data = $this->upload->data();
    $file_name = $upload_data['file_name'];

    $logo_url = base_url('assets/uploads/logo/' . $file_name);
    $this->session->set_userdata('site_logo', $logo_url);

    $this->session->set_flashdata('success', 'Logo berhasil diperbarui.');
    redirect('admin/profile');
}
}