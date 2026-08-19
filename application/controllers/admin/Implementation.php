<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Implementation extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Implementation_model');
        $this->load->library('form_validation');
        $this->load->helper('text');
    }

    /**
     * Halaman daftar implementation
     */
    public function index()
    {
        $data['title'] = 'Implementation';
        $data['name']  = $this->session->userdata('name');
        $data['implementation_steps'] = $this->Implementation_model->get_all();

        $this->load->view('admin/implementation/index', $data);
    }

    /**
     * Tampilkan form tambah implementation
     */
    public function add()
    {
        $data['title'] = 'Tambah Implementation';
        $data['name']  = $this->session->userdata('name');

        // Ambil urutan tertinggi untuk default nilai sort_order
        $max_order = $this->Implementation_model->get_max_sort_order();
        $data['next_order'] = $max_order ? $max_order + 1 : 1;

        $this->load->view('admin/implementation/create', $data);
    }

    /**
     * Simpan data implementation baru
     */
    public function save()
    {
        // Validasi input
        $this->form_validation->set_rules('title', 'Judul', 'required|trim');
        $this->form_validation->set_rules('description', 'Deskripsi', 'required|trim');
        $this->form_validation->set_rules('sort_order', 'Urutan', 'required|integer|greater_than[0]');

        if ($this->form_validation->run() == FALSE) {
            $this->add();
            return;
        }

        $sort_order  = (int) $this->input->post('sort_order', TRUE);
        $upload_path = FCPATH . 'assets/uploads/implementation/';
        $image_name  = '';

        // Upload gambar (jika ada)
        if (!empty($_FILES['image']['name'])) {
            if (!is_dir($upload_path)) {
                mkdir($upload_path, 0755, TRUE);
            }

            $config['upload_path']   = $upload_path;
            $config['allowed_types'] = 'jpg|jpeg|png|webp';
            $config['max_size']      = 5120;
            $config['encrypt_name']  = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                $data['title'] = 'Tambah Implementation';
                $data['name']  = $this->session->userdata('name');
                $data['error'] = $this->upload->display_errors();

                // Jika upload gagal, tampilkan kembali form
                $this->load->view('admin/implementation/create', $data);
                return;
            }

            $upload_data = $this->upload->data();
            $image_name  = $upload_data['file_name'];
        }

        // Mulai transaksi database
        $this->db->trans_start();

        // Geser semua urutan yang >= sort_order naik 1
        $this->Implementation_model->shift_sort_order($sort_order);

        // Siapkan data untuk disimpan
        $insert_data = [
            'title'       => $this->input->post('title', TRUE),
            'description' => $this->input->post('description', TRUE),
            'sort_order'  => $sort_order,
            'image'       => $image_name,
        ];

        $this->Implementation_model->insert($insert_data);

        $this->db->trans_complete();

        // Cek hasil transaksi
        if ($this->db->trans_status() === FALSE) {
            $this->session->set_flashdata('error', 'Gagal menambahkan data.');
        } else {
            $this->session->set_flashdata('success', 'Data implementation berhasil ditambahkan.');
        }

        redirect('admin/implementation');
    }

    /**
     * Edit data implementation
     */
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

            // Validasi input
            $this->form_validation->set_rules('title', 'Judul', 'required|trim');
            $this->form_validation->set_rules('description', 'Deskripsi', 'required|trim');
            $this->form_validation->set_rules('sort_order', 'Urutan', 'required|integer|greater_than[0]');

            if ($this->form_validation->run()) {

                $new_sort_order = (int) $this->input->post('sort_order', TRUE);
                $upload_path = FCPATH . 'assets/uploads/implementation/';

                $update_data = [
                    'title'       => $this->input->post('title', TRUE),
                    'description' => $this->input->post('description', TRUE),
                    'sort_order'  => $new_sort_order,
                ];

                // Proses hapus gambar
                if ($this->input->post('delete_image')) {
                    if (!empty($step->image) && file_exists($upload_path . $step->image)) {
                        unlink($upload_path . $step->image);
                    }
                    $update_data['image'] = NULL;
                }
                // Proses upload gambar baru
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
                        $this->load->view('admin/implementation/edit', $data);
                        return;
                    }

                    $upload_data = $this->upload->data();
                    $update_data['image'] = $upload_data['file_name'];

                    // Hapus file lama
                    if (!empty($step->image) && file_exists($upload_path . $step->image)) {
                        unlink($upload_path . $step->image);
                    }
                }

                // Mulai transaksi
                $this->db->trans_start();

                // Jika sort_order berubah, geser record lain
                if ($new_sort_order != $step->sort_order) {
                    $this->Implementation_model->shift_sort_order($new_sort_order, $id);
                }

                $this->Implementation_model->update($id, $update_data);

                $this->db->trans_complete();

                if ($this->db->trans_status() === FALSE) {
                    $this->session->set_flashdata('error', 'Gagal memperbarui data.');
                } else {
                    $this->session->set_flashdata('success', 'Data implementation berhasil diperbarui.');
                }

                redirect('admin/implementation');
            }
        }

        $this->load->view('admin/implementation/edit', $data);
    }

    /**
     * Hapus data implementation
     */
    public function delete($id)
    {
        $step = $this->Implementation_model->get_by_id($id);

        if (!$step) {
            show_404();
        }

        $upload_path = FCPATH . 'assets/uploads/implementation/';

        // Hapus file gambar jika ada
        if (!empty($step->image) && file_exists($upload_path . $step->image)) {
            unlink($upload_path . $step->image);
        }

        $this->Implementation_model->delete($id);

        $this->session->set_flashdata('success', 'Data implementation berhasil dihapus.');
        redirect('admin/implementation');
    }
}