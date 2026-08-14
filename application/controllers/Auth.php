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

    public function forgot_password()
{
    $data['title'] = 'Lupa Password';

    $this->load->view('auth/forgot_password', $data);

}


public function send_reset_link()
{
    $email = trim(
        $this->input->post('email', TRUE)
    );

    if ($email === '') {

        $this->session->set_flashdata(
            'error',
            'Email wajib diisi.'
        );

        redirect('auth/forgot_password');
        return;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $this->session->set_flashdata(
            'error',
            'Format email tidak valid.'
        );

        redirect('auth/forgot_password');
        return;
    }


    // Cari user berdasarkan email
    $user = $this->db
        ->where('email', $email)
        ->where('status', 'active')
        ->get('users')
        ->row();


    /*
     * Demi keamanan, jangan memberitahu
     * apakah email terdaftar atau tidak.
     */
    if (!$user) {

        $this->session->set_flashdata(
            'success',
            'Jika email terdaftar, link reset password akan dikirim.'
        );

        redirect('auth/forgot_password');
        return;
    }


    // Hapus token lama milik user
    $this->load->model('Password_reset_model');

    $this->Password_reset_model
        ->delete_by_user($user->id);


    // Generate token
    $token = bin2hex(
        random_bytes(32)
    );


    // Token berlaku 1 jam
    $expires_at = date(
        'Y-m-d H:i:s',
        time() + 3600
    );


    $data = [
        'user_id'    => $user->id,
        'token'      => hash('sha256', $token),
        'expires_at' => $expires_at
    ];


    $this->Password_reset_model
        ->create($data);


    /*
     * Link reset password
     */
    $reset_link = site_url(
        'auth/reset_password/' . $token
    );


    /*
     * Email
     */
    $this->load->library('email');


    $this->email->from(
        'desaterpadu1@gmail.com',
        'Desa Terpadu'
    );

    $this->email->to(
        $user->email
    );

    $this->email->subject(
        'Reset Password - Desa Terpadu'
    );


    $message = '
        <div style="
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        ">

            <h2>
                Reset Password
            </h2>

            <p>
                Halo ' . html_escape($user->name) . ',
            </p>

            <p>
                Kami menerima permintaan untuk
                mengatur ulang password akun Desa Terpadu Anda.
            </p>

            <p>
                Klik tombol berikut untuk membuat password baru:
            </p>

            <p>
                <a href="' . $reset_link . '"
                   style="
                       display:inline-block;
                       padding:12px 20px;
                       background:#CC4B4B;
                       color:white;
                       text-decoration:none;
                       border-radius:6px;
                   ">
                    Reset Password
                </a>
            </p>

            <p>
                Link ini berlaku selama <strong>1 jam</strong>.
            </p>

            <p>
                Jika Anda tidak meminta reset password,
                abaikan email ini.
            </p>

            <hr>

            <small>
                Desa Terpadu
            </small>

        </div>
    ';


  if (!$this->email->send()) {

    echo '<h3>EMAIL GAGAL DIKIRIM</h3>';

    echo '<pre>';
    echo $this->email->print_debugger();
    echo '</pre>';

    exit;
}

echo '<h3>EMAIL BERHASIL DIKIRIM</h3>';

echo '<pre>';
echo $this->email->print_debugger();
echo '</pre>';

exit;
}

public function reset_password($token = NULL)
{
    if (!$token) {
        show_404();
    }


    $this->load->model('Password_reset_model');


    $hashed_token = hash(
        'sha256',
        $token
    );


    $reset = $this->Password_reset_model
        ->get_by_token($hashed_token);


    if (!$reset) {

        $data['title'] = 'Reset Password';
        $data['error'] = 'Link reset password tidak valid atau sudah kedaluwarsa.';

        $this->load->view(
            'auth/reset_password',
            $data
        );

        return;
    }


    $data['title'] = 'Reset Password';
    $data['token'] = $token;


    $this->load->view(
        'auth/reset_password',
        $data
    );
}


public function update_password()
{
    $token = $this->input->post(
        'token',
        TRUE
    );

    $password = $this->input->post(
        'password',
        TRUE
    );

    $password_confirm = $this->input->post(
        'password_confirm',
        TRUE
    );


    if (!$token) {

        show_404();
    }


    if (
        $password === '' ||
        $password_confirm === ''
    ) {

        $this->session->set_flashdata(
            'error',
            'Password wajib diisi.'
        );

        redirect(
            'auth/reset_password/' . $token
        );

        return;
    }


    if (strlen($password) < 8) {

        $this->session->set_flashdata(
            'error',
            'Password minimal 8 karakter.'
        );

        redirect(
            'auth/reset_password/' . $token
        );

        return;
    }


    if ($password !== $password_confirm) {

        $this->session->set_flashdata(
            'error',
            'Konfirmasi password tidak sama.'
        );

        redirect(
            'auth/reset_password/' . $token
        );

        return;
    }


    $this->load->model('Password_reset_model');


    $hashed_token = hash(
        'sha256',
        $token
    );


    $reset = $this->Password_reset_model
        ->get_by_token($hashed_token);


    if (!$reset) {

        $this->session->set_flashdata(
            'error',
            'Link reset password tidak valid atau sudah kedaluwarsa.'
        );

        redirect('auth/forgot_password');

        return;
    }


    /*
     * Update password
     */
    $new_password = password_hash(
        $password,
        PASSWORD_DEFAULT
    );


    $this->db
        ->where('id', $reset->user_id)
        ->update(
            'users',
            [
                'password' => $new_password
            ]
        );


    /*
     * Hapus token agar tidak bisa digunakan lagi
     */
    $this->Password_reset_model
        ->delete_by_token($hashed_token);


    $this->session->set_flashdata(
        'success',
        'Password berhasil diubah. Silakan login menggunakan password baru.'
    );


    redirect('auth/login');
}
}