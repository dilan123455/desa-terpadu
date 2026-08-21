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
     * Ambil satu privacy policy berdasarkan sort_order,
     * dengan pengecualian ID tertentu.
     *
     * @param int      $sort_order
     * @param int|null $except_id
     * @return object|null
     */
    public function get_by_sort_order($sort_order, $except_id = null)
    {
        $this->db->where('sort_order', $sort_order);

        if ($except_id !== null) {
            $this->db->where('id !=', $except_id);
        }

        return $this->db->get($this->table)->row();
    }

    /**
     * Cek apakah sort_order sudah dipakai oleh privacy policy lain.
     *
     * @param int      $sort_order
     * @param int|null $except_id
     * @return bool
     */
    public function sort_order_exists($sort_order, $except_id = null)
    {
        $this->db->where('sort_order', $sort_order);

        if ($except_id !== null) {
            $this->db->where('id !=', $except_id);
        }

        return $this->db->count_all_results($this->table) > 0;
    }

    /**
     * Ambil nomor urut berikutnya.
     *
     * @return int
     */
    public function get_next_sort_order()
    {
        $this->db->select_max('sort_order');
        $query = $this->db->get($this->table);
        $row   = $query->row();

        $max = ($row && $row->sort_order) ? (int) $row->sort_order : 0;

        return $max + 1;
    }

    /**
     * Hitung semua data Privacy Policy.
     *
     * @return int
     */
    public function count_all()
    {
        return $this->db->count_all_results($this->table);
    }

    /*
     * =================================================================
     * METHOD DI BAWAH INI TIDAK DIPAKAI LAGI DENGAN LOGIKA BARU.
     * BISA DIHAPUS ATAU DIBIARKAN (TIDAK BERPENGARUH).
     * =================================================================
     */

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