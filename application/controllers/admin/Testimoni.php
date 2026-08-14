<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Testimoni extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
 
        $this->load->model('Testimoni_model');
        $this->load->helper(['url', 'form', 'text']);
        $this->load->library(['form_validation', 'upload']);
    }
 
    public function index()
    {
        $data['title']       = 'Testimoni';
        $data['name']        = $this->session->userdata('name');
        $data['testimonies'] = $this->Testimoni_model->get_all();
 
        $this->load->view('admin/testimoni/index', $data);
    }
 
    public function create()
    {
        $data['title']  = 'Tambah Testimoni';
        $data['name']   = $this->session->userdata('name');
        $data['action'] = 'create';
        $data['item']   = null;
 
        $this->load->view('admin/testimoni/form', $data);
    }
 
    public function store()
    {
        $this->_validate();
 
        if ($this->form_validation->run() == FALSE) {
            $data['title']  = 'Tambah Testimoni';
            $data['name']   = $this->session->userdata('name');
            $data['action'] = 'create';
            $data['item']   = null;
 
            $this->load->view('admin/testimoni/form', $data);
            return;
        }
 
        $photo = $this->_upload_photo();
 
        $data = [
            'name'       => $this->input->post('name', TRUE),
            'position'   => $this->input->post('position', TRUE),
            'content'    => $this->input->post('content', TRUE),
            'photo'      => $photo,
            'status'     => $this->input->post('is_active') ? 'active' : 'inactive',
            'created_at' => date('Y-m-d H:i:s'),
        ];
 
        $this->Testimoni_model->insert($data);
 
        $this->session->set_flashdata('success', 'Testimoni berhasil ditambahkan.');
        redirect('admin/testimoni');
    }

    public function detail($id)
    {
        $item = $this->Testimoni_model->get_by_id($id);

        if (!$item) {
            show_404();
        }

        $data['title'] = 'Detail Testimoni';
        $data['name']  = $this->session->userdata('name');
        $data['item']  = $item;

        $this->load->view('admin/testimoni/detail', $data);
    }
 
    public function edit($id)
    {
        $item = $this->Testimoni_model->get_by_id($id);
 
        if (!$item) {
            show_404();
        }
 
        $data['title']  = 'Edit Testimoni';
        $data['name']   = $this->session->userdata('name');
        $data['action'] = 'edit';
        $data['item']   = $item;
 
        $this->load->view('admin/testimoni/form', $data);
    }
 
    public function update($id)
    {
        $item = $this->Testimoni_model->get_by_id($id);

        if (!$item) {
            show_404();
        }

        $this->_validate();

        if ($this->form_validation->run() == FALSE) {
            $data['title']  = 'Edit Testimoni';
            $data['name']   = $this->session->userdata('name');
            $data['action'] = 'edit';
            $data['item']   = $item;

            $this->load->view('admin/testimoni/form', $data);
            return;
        }

        $data = [
            'name'       => $this->input->post('name', TRUE),
            'position'   => $this->input->post('position', TRUE),
            'content'    => $this->input->post('content', TRUE),
            'status'     => $this->input->post('is_active') ? 'active' : 'inactive',
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        /*
        |--------------------------------------------------------------------------
        | FOTO
        |--------------------------------------------------------------------------
        */

        // Apakah user mencentang "Hapus Foto"?
        $remove_photo = $this->input->post('remove_photo');

        // Cek apakah user memilih foto baru
        $photo = $this->_upload_photo();

        /*
        |--------------------------------------------------------------------------
        | 1. Jika memilih foto baru
        |--------------------------------------------------------------------------
        */
        if ($photo) {

            // Hapus foto lama dari folder
            if (
                !empty($item->photo) &&
                file_exists('./uploads/testimoni/' . $item->photo)
            ) {
                unlink('./uploads/testimoni/' . $item->photo);
            }

            // Simpan nama foto baru
            $data['photo'] = $photo;
        }

        /*
        |--------------------------------------------------------------------------
        | 2. Jika tidak upload foto baru tetapi mencentang Hapus Foto
        |--------------------------------------------------------------------------
        */
        elseif ($remove_photo) {

            // Hapus foto lama dari folder
            if (
                !empty($item->photo) &&
                file_exists('./uploads/testimoni/' . $item->photo)
            ) {
                unlink('./uploads/testimoni/' . $item->photo);
            }

            // Kosongkan foto di database
            $data['photo'] = NULL;
        }

        /*
        |--------------------------------------------------------------------------
        | 3. Jika tidak upload foto baru dan tidak centang hapus
        |--------------------------------------------------------------------------
        | Foto lama tetap dipertahankan.
        |--------------------------------------------------------------------------
        */

        $this->Testimoni_model->update($id, $data);

        $this->session->set_flashdata(
            'success',
            'Testimoni berhasil diperbarui.'
        );

        redirect('admin/testimoni');
    }
 
    public function delete($id)
    {
        $item = $this->Testimoni_model->get_by_id($id);
 
        if (!$item) {
            show_404();
        }
 
        if (!empty($item->photo) && file_exists('./uploads/testimoni/' . $item->photo)) {
            unlink('./uploads/testimoni/' . $item->photo);
        }
 
        $this->Testimoni_model->delete($id);
 
        $this->session->set_flashdata('success', 'Testimoni berhasil dihapus.');
        redirect('admin/testimoni');
    }
 
    private function _validate()
    {
        $this->form_validation->set_rules('name', 'Nama', 'required|trim');
        $this->form_validation->set_rules('content', 'Isi Testimoni', 'required|trim');
    }
 
    private function _upload_photo()
    {
        if (empty($_FILES['photo']['name'])) {
            return null;
        }
 
        $config['upload_path']   = './uploads/testimoni/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = 5120; // KB
        $config['encrypt_name']  = TRUE;
 
        $this->upload->initialize($config);
 
        if (!$this->upload->do_upload('photo')) {
            $this->session->set_flashdata('error', $this->upload->display_errors('', ''));
            return null;
        }
 
        return $this->upload->data('file_name');
    }
}