<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata(
                'error',
                'Silakan login terlebih dahulu.'
            );
            redirect('auth/login');
        }

        $this->load->model('Faq_model');
        $this->load->helper('url');
        $this->load->helper('text');
    }

    public function index()
    {
        $data['title']         = 'FAQ';
        $data['name']          = $this->session->userdata('name');
        $data['page_title']    = 'FAQ';
        $data['page_subtitle'] = 'Kelola pertanyaan dan jawaban yang sering ditanyakan';
        $data['faqs']          = $this->Faq_model->get_all();

        $this->load->view('admin/faq/index', $data);
    }

    public function create()
    {
        $data['title']         = 'Tambah FAQ';
        $data['name']          = $this->session->userdata('name');
        $data['page_title']    = 'Tambah FAQ';
        $data['page_subtitle'] = 'Buat pertanyaan dan jawaban baru';

        // Ambil nomor urut berikutnya untuk default input
        $data['next_sort_order'] = $this->Faq_model->get_next_sort_order();

        $this->load->view('admin/faq/create', $data);
    }

    public function store()
    {
        $question   = trim($this->input->post('question', TRUE));
        $answer     = trim($this->input->post('answer', FALSE));
        $status     = $this->input->post('status', TRUE);

        if ($question === '' || $answer === '') {
            $this->session->set_flashdata(
                'error',
                'Pertanyaan dan jawaban wajib diisi.'
            );

            redirect('admin/faq/create');
            return;
        }

        // Pastikan sort_order unik
        $sort_order = $this->_unique_sort_order(
            $this->input->post('sort_order')
        );

        $data = [
            'question'    => $question,
            'answer'      => $answer,
            'status'      => ($status === 'inactive') ? 'inactive' : 'active',
            'sort_order'  => $sort_order,
            'created_at'  => date('Y-m-d H:i:s'),
            'updated_at'  => date('Y-m-d H:i:s')
        ];

        $this->Faq_model->insert($data);

        $this->session->set_flashdata(
            'success',
            'FAQ berhasil ditambahkan.'
        );

        redirect('admin/faq');
    }

    public function edit($id)
    {
        $faq = $this->Faq_model->get_by_id($id);

        if (!$faq) {
            show_404();
        }

        $data['title']         = 'Edit FAQ';
        $data['name']          = $this->session->userdata('name');
        $data['page_title']    = 'Edit FAQ';
        $data['page_subtitle'] = 'Perbarui pertanyaan dan jawaban';
        $data['faq']           = $faq;

        $this->load->view('admin/faq/edit', $data);
    }

    public function detail($id)
    {
        $faq = $this->Faq_model->get_by_id($id);

        if (!$faq) {
            show_404();
        }

        $data['title']         = 'Detail FAQ';
        $data['name']          = $this->session->userdata('name');
        $data['page_title']    = 'Detail FAQ';
        $data['page_subtitle'] = 'Lihat detail pertanyaan dan jawaban';
        $data['faq']           = $faq;

        $this->load->view('admin/faq/detail', $data);
    }

    public function update($id)
    {
        $faq = $this->Faq_model->get_by_id($id);

        if (!$faq) {
            show_404();
        }

        $question   = trim($this->input->post('question', TRUE));
        $answer     = trim($this->input->post('answer', FALSE));
        $status     = $this->input->post('status', TRUE);

        if ($question === '' || $answer === '') {
            $this->session->set_flashdata(
                'error',
                'Pertanyaan dan jawaban wajib diisi.'
            );

            redirect('admin/faq/edit/' . $id);
            return;
        }

        $new_sort_order = (int) $this->input->post('sort_order');
        $old_sort_order = (int) $faq->sort_order;

        // Jika input kosong/0, otomatis pakai nomor berikutnya
        if ($new_sort_order <= 0) {
            $new_sort_order = $this->Faq_model->get_next_sort_order();
            // Jika ternyata sama dengan nomor lama, biarkan tetap
            if ($new_sort_order == $old_sort_order) {
                $new_sort_order = $old_sort_order;
            }
        }

        $swap_needed = false;
        $other_faq = null;

        // Cek apakah nomor baru dipakai oleh FAQ lain
        if ($new_sort_order != $old_sort_order) {
            $other_faq = $this->Faq_model->get_by_sort_order($new_sort_order, $id);
            if ($other_faq) {
                $swap_needed = true;
            }
        }

        // Mulai transaksi jika perlu swap
        if ($swap_needed) {
            $this->db->trans_start();

            // FAQ lain memakai nomor lama
            $this->Faq_model->update($other_faq->id, [
                'sort_order' => $old_sort_order,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }

        $data = [
            'question'   => $question,
            'answer'     => $answer,
            'status'     => ($status === 'inactive') ? 'inactive' : 'active',
            'sort_order' => $new_sort_order,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->Faq_model->update($id, $data);

        if ($swap_needed) {
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->session->set_flashdata(
                    'error',
                    'Gagal menyimpan perubahan urutan FAQ.'
                );
                redirect('admin/faq/edit/' . $id);
                return;
            }
        }

        $this->session->set_flashdata(
            'success',
            'FAQ berhasil diperbarui.'
        );

        redirect('admin/faq');
    }

    public function delete($id)
    {
        $faq = $this->Faq_model->get_by_id($id);

        if (!$faq) {
            show_404();
        }

        $this->Faq_model->delete($id);

        $this->session->set_flashdata(
            'success',
            'FAQ berhasil dihapus.'
        );

        redirect('admin/faq');
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
            return $this->Faq_model->get_next_sort_order();
        }

        // Selama masih dipakai, naikkan terus
        while ($this->Faq_model->sort_order_exists($sort_order, $except_id)) {
            $sort_order++;
        }

        return $sort_order;
    }
}