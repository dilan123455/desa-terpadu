<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq_model extends CI_Model
{
    private $table = 'faqs';

    public function get_all()
    {
        return $this->db
            ->order_by('sort_order', 'ASC')
            ->order_by('created_at', 'DESC')
            ->get($this->table)
            ->result();
    }

    public function get_active()
    {
        return $this->db
            ->where('status', 'active')
            ->order_by('sort_order', 'ASC')
            ->order_by('created_at', 'DESC')
            ->get($this->table)
            ->result();
    }

    public function get_by_id($id)
    {
        return $this->db
            ->where('id', $id)
            ->get($this->table)
            ->row();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update($this->table, $data);
    }

    public function delete($id)
    {
        return $this->db
            ->where('id', $id)
            ->delete($this->table);
    }

    /**
     * Ambil satu FAQ berdasarkan sort_order, dengan pengecualian ID tertentu.
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
     * Cek apakah sort_order sudah dipakai oleh FAQ lain.
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
     * Hitung semua data FAQ.
     *
     * @return int
     */
    public function count_all()
    {
        return $this->db->count_all_results($this->table);
    }
}