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
        $data['privacy_policies'] =
            $this->Privacy_policy_model->get_all();

        $this->load->view(
            'admin/privacy_policy/index',
            $data
        );
    }


    /**
     * Form tambah Privacy Policy
     */
    public function create()
    {
        $this->load->view(
            'admin/privacy_policy/create'
        );
    }


    /**
     * Menyimpan Privacy Policy baru
     */
        public function store()
        {
            $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
            $this->form_validation->set_rules('isi', 'Isi', 'required|trim');
            $this->form_validation->set_rules('sort_order', 'Urutan Tampil', 'required|integer');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/privacy_policy/create');
                return;
            }

            $sort_order = (int) $this->input->post('sort_order');

            // Geser data yang sudah ada agar tidak terjadi duplikat urutan
            $this->Privacy_policy_model->shift_sort_order_for_insert($sort_order);

            $data = [
                'judul' => $this->input->post('judul', TRUE),
                'isi'   => $this->input->post('isi'),
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
        $data['privacy_policy'] =
            $this->Privacy_policy_model->get_by_id($id);


        if (!$data['privacy_policy'])
        {
            show_404();
        }


        $this->load->view(
            'admin/privacy_policy/edit',
            $data
        );
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
        $this->form_validation->set_rules('sort_order', 'Urutan Tampil', 'required|integer');

        if ($this->form_validation->run() == FALSE) {
            $data['privacy_policy'] = $privacy_policy;
            $this->load->view('admin/privacy_policy/edit', $data);
            return;
        }

        $new_sort_order = (int) $this->input->post('sort_order');
        $old_sort_order = (int) $privacy_policy->sort_order;

        // Geser data lain jika urutan berubah
        $this->Privacy_policy_model->shift_sort_order_for_update($id, $new_sort_order, $old_sort_order);

        $data = [
            'judul' => $this->input->post('judul', TRUE),
            'isi'   => $this->input->post('isi'),
            'sort_order' => $new_sort_order
        ];

        $this->Privacy_policy_model->update($id, $data);

        $this->session->set_flashdata('success', 'Privacy Policy berhasil diperbarui.');
        redirect('admin/privacy_policy');
    }

    /**
     * Menghapus Privacy Policy
     */
    public function delete($id)
    {
        $privacy_policy =
            $this->Privacy_policy_model->get_by_id($id);


        if (!$privacy_policy)
        {
            show_404();
        }


        $this->Privacy_policy_model->delete(
            $id
        );


        $this->session->set_flashdata(
            'success',
            'Privacy Policy berhasil dihapus.'
        );


        redirect(
            'admin/privacy_policy'
        );
    }
}