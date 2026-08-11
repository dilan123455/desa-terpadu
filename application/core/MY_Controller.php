<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
/**
 * Base controller untuk semua controller di area admin.
 * Semua controller admin (Article, Testimoni, Faq, dst) tinggal
 * "extends Admin_Controller" biar otomatis ke-cek login-nya.
 *
 * CATATAN: sesuaikan nama session key ('admin_id') dengan yang
 * dipakai di proses login kalian sekarang.
 */
class Admin_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
 
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('error', 'Silakan login terlebih dahulu.');
            redirect('auth/login');
        }
    }
}
