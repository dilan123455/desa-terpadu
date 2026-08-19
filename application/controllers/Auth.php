<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('User_model');
        $this->load->library('session');
        
        // Load file konfigurasi rahasia (Supaya Secret Key tidak bocor ke GitHub)
        $this->load->config('cloudflare');
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

        // ==========================================
        // CLOUDFLARE TURNSTILE (BACKEND VALIDATION)
        // ==========================================
        $turnstile_token = $this->input->post('cf-turnstile-response');

        if (empty($turnstile_token)) {
            $this->session->set_flashdata('error', 'Silakan verifikasi bahwa Anda bukan robot.');
            redirect('auth/login');
            return;
        }

        // Ambil Secret Key dari file config (JANGAN hardcode di sini!)
        $secret_key = $this->config->item('turnstile_secret_key');

        $post_data = [
            'secret'   => $secret_key,
            'response' => $turnstile_token,
            'remoteip' => $this->input->ip_address()
        ];

        $ch = curl_init('https://challenges.cloudflare.com/turnstile/v0/siteverify');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);

        // [BYPASS SSL UNTUK LARAGON]
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            $this->session->set_flashdata('error', 'Gagal terhubung ke Cloudflare: ' . curl_error($ch));
            curl_close($ch);
            redirect('auth/login');
            return;
        }
        curl_close($ch);

        $result = json_decode($response, TRUE);

        // Jika Turnstile gagal, tampilkan error code-nya agar Anda bisa debug
        if (empty($result) || empty($result['success'])) {
            $error_codes = isset($result['error-codes']) ? implode(', ', $result['error-codes']) : 'Tidak ada respon dari Cloudflare';
            
            $this->session->set_flashdata('error', 'Captcha Gagal! Kode Error: ' . $error_codes);
            redirect('auth/login');
            return;
        }

        // ==========================================
        // LOGIN USER
        // ==========================================
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
            $this->session->set_flashdata('error', 'Username atau password salah.');
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
        $email = trim($this->input->post('email', TRUE));

        if ($email === '') {
            $this->session->set_flashdata('error', 'Email wajib diisi.');
            redirect('auth/forgot_password');
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->session->set_flashdata('error', 'Format email tidak valid.');
            redirect('auth/forgot_password');
            return;
        }

        $user = $this->db->where('email', $email)->get('users')->row();

        if (!$user) {
            // Debugging user tidak ditemukan (seperti kode asli Anda)
            echo '<pre>';
            echo "USER TIDAK DITEMUKAN\n\n";
            echo "Email yang dicari: "; echo $email; echo "\n\n";
            echo "Data users dengan email tersebut:\n";
            $check = $this->db->where('email', $email)->get('users')->row();
            print_r($check);
            echo '</pre>';
            exit;
        }

        $this->load->model('Password_reset_model');
        $this->Password_reset_model->delete_by_user($user->id);

        $token = bin2hex(random_bytes(32));
        $expires_at = date('Y-m-d H:i:s', time() + 3600);

        $data = [
            'user_id'    => $user->id,
            'token'      => hash('sha256', $token),
            'expires_at' => $expires_at
        ];

        $this->Password_reset_model->create($data);

        $reset_link = site_url('auth/reset_password/' . $token);

        $this->load->library('email');
        $this->email->from('desaterpadu1@gmail.com', 'Desa Terpadu');
        $this->email->to($user->email);
        $this->email->subject('Reset Password - Desa Terpadu');

        $message = '
        <!DOCTYPE html>
        <html>
        <head><meta charset="UTF-8"><title>Reset Password - Desa Terpadu</title></head>
        <body style="margin:0;padding:0;background:#f5f5f5;font-family:Arial, Helvetica, sans-serif;">
            <div style="max-width:600px;margin:30px auto;background:#ffffff;border-radius:10px;overflow:hidden;border:1px solid #e5e7eb;">
                <div style="background:#CC4B4B;padding:25px;text-align:center;color:#ffffff;">
                    <h2 style="margin:0;font-size:24px;">Desa Terpadu</h2>
                    <p style="margin:8px 0 0;font-size:14px;">Panel Administrasi</p>
                </div>
                <div style="padding:30px;color:#333333;line-height:1.6;">
                    <h3 style="margin-top:0;color:#222222;">Reset Password</h3>
                    <p>Halo <strong>' . html_escape($user->name) . '</strong>,</p>
                    <p>Kami menerima permintaan untuk mengatur ulang password akun Desa Terpadu Anda.</p>
                    <p>Silakan klik tombol di bawah ini untuk membuat password baru:</p>
                    <p style="text-align:center; margin:30px 0;">
                        <a href="' . $reset_link . '" style="display:inline-block;background:#CC4B4B;color:#ffffff;text-decoration:none;padding:14px 25px;border-radius:7px;font-weight:bold;">Reset Password</a>
                    </p>
                    <p>Link reset password ini berlaku selama <strong>1 jam</strong>.</p>
                    <p>Jika Anda tidak meminta reset password, silakan abaikan email ini.</p>
                    <hr style="border:0;border-top:1px solid #eeeeee;margin:25px 0;">
                    <p style="font-size:12px;color:#777777;margin-bottom:0;">Email ini dikirim secara otomatis oleh sistem Desa Terpadu. Mohon jangan membalas email ini.</p>
                </div>
            </div>
        </body>
        </html>';

        $this->email->set_mailtype('html');
        $this->email->set_alt_message("Halo " . $user->name . ",\n\nKami menerima permintaan untuk mengatur ulang password akun Desa Terpadu Anda.\n\nSilakan buka link berikut untuk membuat password baru:\n" . $reset_link . "\n\nLink ini berlaku selama 1 jam.\n\nJika Anda tidak meminta reset password, abaikan email ini.\n\nDesa Terpadu");
        $this->email->message($message);

        if (!$this->email->send()) {
            $this->session->set_flashdata('error', 'Email reset password gagal dikirim.');
            redirect('auth/forgot_password');
            return;
        }

        $this->session->set_flashdata('success', 'Link reset password telah dikirim ke email Anda.');
        redirect('auth/forgot_password');
    }

    public function reset_password($token = NULL)
    {
        if (!$token) show_404();

        $this->load->model('Password_reset_model');
        $hashed_token = hash('sha256', $token);
        $reset = $this->Password_reset_model->get_by_token($hashed_token);

        if (!$reset) {
            $data['title'] = 'Reset Password';
            $data['error'] = 'Link reset password tidak valid atau sudah kedaluwarsa.';
            $this->load->view('auth/reset_password', $data);
            return;
        }

        $data['title'] = 'Reset Password';
        $data['token'] = $token;
        $this->load->view('auth/reset_password', $data);
    }

    public function update_password()
    {
        $token = $this->input->post('token', TRUE);
        $password = $this->input->post('password', TRUE);
        $password_confirm = $this->input->post('password_confirm', TRUE);

        if (!$token) show_404();

        if ($password === '' || $password_confirm === '') {
            $this->session->set_flashdata('error', 'Password wajib diisi.');
            redirect('auth/reset_password/' . $token);
            return;
        }

        if (strlen($password) < 8) {
            $this->session->set_flashdata('error', 'Password minimal 8 karakter.');
            redirect('auth/reset_password/' . $token);
            return;
        }

        if ($password !== $password_confirm) {
            $this->session->set_flashdata('error', 'Konfirmasi password tidak sama.');
            redirect('auth/reset_password/' . $token);
            return;
        }

        $this->load->model('Password_reset_model');
        $hashed_token = hash('sha256', $token);
        $reset = $this->Password_reset_model->get_by_token($hashed_token);

        if (!$reset) {
            $this->session->set_flashdata('error', 'Link reset password tidak valid atau sudah kedaluwarsa.');
            redirect('auth/forgot_password');
            return;
        }

        $new_password = password_hash($password, PASSWORD_DEFAULT);
        $this->db->where('id', $reset->user_id)->update('users', ['password' => $new_password]);
        $this->Password_reset_model->delete_by_token($hashed_token);

        $this->session->set_flashdata('success', 'Password berhasil diubah. Silakan login menggunakan password baru.');
        redirect('auth/login');
    }
}