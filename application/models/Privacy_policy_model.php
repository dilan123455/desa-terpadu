<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Privacy_policy_model extends CI_Model
{
    private $table = 'privacy_policies';

    /**
     * Ambil semua Privacy Policy
     * berdasarkan urutan tampil
     */
    public function get_all()
    {
        return $this->db
            ->order_by('sort_order', 'ASC')
            ->get($this->table)
            ->result();
    }

    /**
     * Ambil satu data berdasarkan ID
     */
    public function get_by_id($id)
    {
        return $this->db
            ->where('id', $id)
            ->get($this->table)
            ->row();
    }

    /**
     * Tambah Privacy Policy
     */
    public function insert($data)
    {
        return $this->db
            ->insert($this->table, $data);
    }

    /**
     * Update Privacy Policy
     */
    public function update($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update($this->table, $data);
    }

    /**
     * Hapus Privacy Policy
     */
    public function delete($id)
    {
        return $this->db
            ->where('id', $id)
            ->delete($this->table);
    }

    /**
     * Geser urutan ke bawah saat ada data baru masuk
     * (menaikkan sort_order data lain yang >= $sort_order)
     */
    public function shift_sort_order_for_insert($sort_order)
    {
        // Naikkan sort_order sebanyak 1 untuk data yang >= $sort_order
        $this->db->set('sort_order', 'sort_order + 1', FALSE);
        $this->db->where('sort_order >=', $sort_order);
        $this->db->update($this->table);
    }

    /**
     * Geser urutan saat ada data yang diupdate
     */
    public function shift_sort_order_for_update($id, $new_sort_order, $old_sort_order)
    {
        // Jika tidak berubah, tidak perlu geser
        if ($new_sort_order == $old_sort_order) {
            return;
        }

        // Jika nomor baru lebih kecil (pindah ke atas)
        if ($new_sort_order < $old_sort_order) {
            // Naikkan +1 untuk data antara posisi baru dan posisi lama (selain data sendiri)
            $this->db->set('sort_order', 'sort_order + 1', FALSE);
            $this->db->where('id !=', $id);
            $this->db->where('sort_order >=', $new_sort_order);
            $this->db->where('sort_order <', $old_sort_order);
            $this->db->update($this->table);
        }
        // Jika nomor baru lebih besar (pindah ke bawah)
        else {
            // Turunkan -1 untuk data antara posisi lama dan posisi baru (selain data sendiri)
            $this->db->set('sort_order', 'sort_order - 1', FALSE);
            $this->db->where('id !=', $id);
            $this->db->where('sort_order >', $old_sort_order);
            $this->db->where('sort_order <=', $new_sort_order);
            $this->db->update($this->table);
        }
    }
}