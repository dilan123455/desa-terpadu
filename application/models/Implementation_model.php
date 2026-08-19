<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Implementation_model extends CI_Model
{
    /**
     * Ambil semua data implementation, urutkan berdasarkan sort_order
     *
     * @return array of objects
     */
    public function get_all()
    {
        return $this->db
            ->order_by('sort_order', 'ASC')
            ->get('implementation_steps')
            ->result();
    }

    /**
     * Ambil satu baris data berdasarkan ID
     *
     * @param int $id
     * @return object|null
     */
    public function get_by_id($id)
    {
        return $this->db
            ->where('id', $id)
            ->get('implementation_steps')
            ->row();
    }

    /**
     * Tambah data baru
     *
     * @param array $data
     * @return bool
     */
    public function insert($data)
    {
        return $this->db->insert('implementation_steps', $data);
    }

    /**
     * Update data berdasarkan ID
     *
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update('implementation_steps', $data);
    }

    /**
     * Hapus data berdasarkan ID
     *
     * @param int $id
     * @return bool
     */
    public function delete($id)
    {
        return $this->db
            ->where('id', $id)
            ->delete('implementation_steps');
    }

    /**
     * Hitung total baris data
     *
     * @return int
     */
    public function count_all()
    {
        return $this->db->count_all('implementation_steps');
    }

    /**
     * Ambil nilai sort_order tertinggi
     *
     * @return int|null
     */
    public function get_max_sort_order()
    {
        $this->db->select_max('sort_order');
        $query = $this->db->get('implementation_steps');
        $max = $query->row()->sort_order;
        return ($max !== null) ? (int)$max : null;
    }

    /**
     * Geser sort_order semua record yang >= $min_sort_order
     * naik 1 angka, kecuali record dengan id = $exclude_id
     *
     * @param int $min_sort_order
     * @param int|null $exclude_id
     * @return bool
     */
    public function shift_sort_order($min_sort_order, $exclude_id = null)
    {
        // Pastikan nilai minimal 1 agar tidak menggeser semua data
        if ($min_sort_order < 1) {
            return false;
        }

        $this->db->set('sort_order', 'sort_order + 1', FALSE);
        $this->db->where('sort_order >=', $min_sort_order);

        if ($exclude_id !== null) {
            $this->db->where('id !=', $exclude_id);
        }

        return $this->db->update('implementation_steps');
    }

    /**
     * (Opsional) Rapikan urutan menjadi 1,2,3,... tanpa gap
     *
     * @return bool
     */
    public function reorder_all()
    {
        $rows = $this->db
            ->order_by('sort_order', 'ASC')
            ->get('implementation_steps')
            ->result();

        $i = 1;
        foreach ($rows as $row) {
            $this->db
                ->where('id', $row->id)
                ->update('implementation_steps', ['sort_order' => $i]);
            $i++;
        }

        return true;
    }
}