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

    // Hitung semua data FAQ
    public function count_all()
    {
        return $this->db->count_all_results($this->table);
    }
    
}