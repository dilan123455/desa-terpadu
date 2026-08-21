<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Privacy_policy extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Privacy_policy_model');
        $this->load->library('form_validation');

        // Jika project kamu sudah punya sistem auth admin,
        // tambahkan pengecekan login admin di sini.
    }

    /**
     * Menampilkan daftar Privacy Policy di admin
     */
    public function index()
    {
        $data['title']            = 'Privacy Policy';
        $data['page_title']       = 'Privacy Policy';
        $data['page_subtitle']    = 'Kelola kebijakan privasi website Desa Terpadu';
        $data['privacy_policies'] = $this->Privacy_policy_model->get_all();

        $this->load->view('admin/privacy_policy/index', $data);
    }

    /**
     * Form tambah Privacy Policy
     */
    public function create()
    {
        $data['title']            = 'Tambah Privacy Policy';
        $data['page_title']       = 'Tambah Privacy Policy';
        $data['page_subtitle']    = 'Buat kebijakan privasi baru';

        // Ambil nomor urut berikutnya sebagai nilai default form
        $data['next_sort_order'] = $this->Privacy_policy_model->get_next_sort_order();

        $this->load->view('admin/privacy_policy/create', $data);
    }

    /**
     * Menyimpan Privacy Policy baru
     */
    public function store()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('isi', 'Isi', 'required|trim');
        $this->form_validation->set_rules('sort_order', 'Urutan Tampil', 'integer');

        if ($this->form_validation->run() == FALSE) {
            $data['title']            = 'Tambah Privacy Policy';
            $data['page_title']       = 'Tambah Privacy Policy';
            $data['page_subtitle']    = 'Buat kebijakan privasi baru';
            $data['next_sort_order']  = $this->Privacy_policy_model->get_next_sort_order();

            $this->load->view('admin/privacy_policy/create', $data);
            return;
        }

        // Pastikan sort_order unik
        $sort_order = $this->_unique_sort_order(
            $this->input->post('sort_order')
        );

        $data = [
            'judul'      => $this->input->post('judul', TRUE),
            'isi'        => $this->input->post('isi'),
            'sort_order' => $sort_order
        ];

        $this->Privacy_policy_model->insert($data);

        $this->session->set_flashdata('success', 'Privacy Policy berhasil ditambahkan.');
        redirect('admin/privacy_policy');
    }

    /**
     * Form edit Privacy Policy
     */
    public function edit($id)
    {
        $data['privacy_policy'] = $this->Privacy_policy_model->get_by_id($id);

        if (!$data['privacy_policy']) {
            show_404();
        }

        $data['title']         = 'Edit Privacy Policy';
        $data['page_title']    = 'Edit Privacy Policy';
        $data['page_subtitle'] = 'Perbarui kebijakan privasi';

        $this->load->view('admin/privacy_policy/edit', $data);
    }

    /**
     * Memperbarui Privacy Policy
     */
    public function update($id)
    {
        $privacy_policy = $this->Privacy_policy_model->get_by_id($id);

        if (!$privacy_policy) {
            show_404();
        }

        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('isi', 'Isi', 'required|trim');
        $this->form_validation->set_rules('sort_order', 'Urutan Tampil', 'integer');

        if ($this->form_validation->run() == FALSE) {
            $data['privacy_policy'] = $privacy_policy;
            $data['title']          = 'Edit Privacy Policy';
            $data['page_title']     = 'Edit Privacy Policy';
            $data['page_subtitle']  = 'Perbarui kebijakan privasi';

            $this->load->view('admin/privacy_policy/edit', $data);
            return;
        }

        $new_sort_order = (int) $this->input->post('sort_order');
        $old_sort_order = (int) $privacy_policy->sort_order;

        // Jika input kosong/0, otomatis pakai nomor berikutnya
        if ($new_sort_order <= 0) {
            $new_sort_order = $this->Privacy_policy_model->get_next_sort_order();
        }

        $swap_needed = false;
        $other_pp    = null;

        // Cek apakah nomor baru dipakai oleh privacy policy lain
        if ($new_sort_order != $old_sort_order) {
            $other_pp = $this->Privacy_policy_model->get_by_sort_order($new_sort_order, $id);
            if ($other_pp) {
                $swap_needed = true;
            }
        }

        // Jika perlu swap, lakukan dalam transaksi
        if ($swap_needed) {
            $this->db->trans_start();

            // Privacy policy lain memakai nomor urut lama
            $this->Privacy_policy_model->update($other_pp->id, [
                'sort_order' => $old_sort_order
            ]);
        }

        $data = [
            'judul'      => $this->input->post('judul', TRUE),
            'isi'        => $this->input->post('isi'),
            'sort_order' => $new_sort_order
        ];

        $this->Privacy_policy_model->update($id, $data);

        if ($swap_needed) {
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->session->set_flashdata(
                    'error',
                    'Gagal menyimpan perubahan urutan Privacy Policy.'
                );
                redirect('admin/privacy_policy/edit/' . $id);
                return;
            }
        }

        $this->session->set_flashdata('success', 'Privacy Policy berhasil diperbarui.');
        redirect('admin/privacy_policy');
    }

    /**
     * Menghapus Privacy Policy
     */
    public function delete($id)
    {
        $privacy_policy = $this->Privacy_policy_model->get_by_id($id);

        if (!$privacy_policy) {
            show_404();
        }

        $this->Privacy_policy_model->delete($id);

        $this->session->set_flashdata('success', 'Privacy Policy berhasil dihapus.');

        redirect('admin/privacy_policy');
    }

    /**
     * Cari sort_order yang belum dipakai.
     *
     * Jika input kosong/0, otomatis memakai nomor berikutnya.
     * Jika input sudah dipakai, naikkan sampai menemukan nomor kosong.
     *
     * @param int|null $sort_order
     * @param int|null $except_id
     * @return int
     */
    private function _unique_sort_order($sort_order, $except_id = null)
    {
        $sort_order = (int) $sort_order;

        // Jika kosong atau 0, langsung pakai nomor berikutnya
        if ($sort_order <= 0) {
            return $this->Privacy_policy_model->get_next_sort_order();
        }

        // Selama masih dipakai, naikkan terus
        while ($this->Privacy_policy_model->sort_order_exists($sort_order, $except_id)) {
            $sort_order++;
        }

        return $sort_order;
    }
}