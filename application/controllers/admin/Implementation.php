<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Implementation extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Implementation_model');
        $this->load->library('form_validation');
        $this->load->helper('text'); // Tambahan untuk character_limiter
    }

    public function index()
    {
        $data['title'] = 'Implementation';
        $data['name']  = $this->session->userdata('name');
        $data['implementation_steps'] = $this->Implementation_model->get_all();

        $this->load->view('admin/implementation/index', $data);
    }

    public function edit($id)
    {
        $step = $this->Implementation_model->get_by_id($id);

        if (!$step) {
            show_404();
        }

        $data['title'] = 'Edit Implementation';
        $data['name']  = $this->session->userdata('name');
        $data['step']  = $step;

        if ($this->input->method() === 'post') {

            $this->form_validation->set_rules(
                'title',
                'Judul',
                'required|trim'
            );

            $this->form_validation->set_rules(
                'description',
                'Deskripsi',
                'required|trim'
            );

            $this->form_validation->set_rules(
                'sort_order',
                'Urutan',
                'required|integer'
            );

            if ($this->form_validation->run()) {

                $update_data = [
                    'title'       => $this->input->post('title', TRUE),
                    'description' => $this->input->post('description', TRUE),
                    'sort_order'  => $this->input->post('sort_order', TRUE)
                ];

                /*
                 * Upload gambar hanya jika admin
                 * memilih gambar baru.
                 */
                $upload_path = FCPATH . 'assets/uploads/implementation/';

                // ========================================
                // 1. JIKA ADMIN MEMILIH "HAPUS GAMBAR"
                // ========================================
                if ($this->input->post('delete_image')) {

                    // Hapus file lama dari folder
                    if (
                        !empty($step->image) &&
                        file_exists($upload_path . $step->image)
                    ) {
                        unlink($upload_path . $step->image);
                    }

                    // Kosongkan nama gambar di database
                    $update_data['image'] = NULL;
                }

                // ========================================
                // 2. JIKA ADMIN MEMILIH GAMBAR BARU
                // ========================================
                elseif (!empty($_FILES['image']['name'])) {

                    if (!is_dir($upload_path)) {
                        mkdir($upload_path, 0755, TRUE);
                    }

                    $config['upload_path']   = $upload_path;
                    $config['allowed_types'] = 'jpg|jpeg|png|webp';
                    $config['max_size']      = 5120;
                    $config['encrypt_name']  = TRUE;

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('image')) {

                        $data['error'] = $this->upload->display_errors();

                        $this->load->view(
                            'admin/implementation/edit',
                            $data
                        );

                        return;
                    }

                    // Data gambar baru
                    $upload_data = $this->upload->data();

                    $update_data['image'] = $upload_data['file_name'];

                    // Hapus file gambar lama
                    if (
                        !empty($step->image) &&
                        file_exists($upload_path . $step->image)
                    ) {
                        unlink($upload_path . $step->image);
                    }
                }

                // ========================================
                // 3. JIKA TIDAK PILIH APA-APA
                // ========================================
                // Gambar lama tetap tersimpan.

                $this->Implementation_model->update(
                    $id,
                    $update_data
                );

                $this->session->set_flashdata(
                    'success',
                    'Data implementation berhasil diperbarui.'
                );

                redirect('admin/implementation');
            }
        }

        // Jika request GET atau validasi gagal
        $this->load->view(
            'admin/implementation/edit',
            $data
        );
    }

    public function delete($id)
    {
        $step = $this->Implementation_model->get_by_id($id);

        if (!$step) {
            show_404();
        }

        $upload_path = FCPATH . 'assets/uploads/implementation/';

        if (
            !empty($step->image) &&
            file_exists($upload_path . $step->image)
        ) {
            unlink($upload_path . $step->image);
        }

        $this->Implementation_model->delete($id);

        $this->session->set_flashdata(
            'success',
            'Data implementation berhasil dihapus.'
        );

        redirect('admin/implementation');
    }
}