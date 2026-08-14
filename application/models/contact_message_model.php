<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_message_model extends CI_Model
{
    private $table = 'contact_messages';

    public function get_all()
    {
        return $this->db
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

    public function update_status($id, $status)
    {
        return $this->db
            ->where('id', $id)
            ->update($this->table, [
                'status' => $status
            ]);
    }

    public function delete($id)
    {
        return $this->db
            ->where('id', $id)
            ->delete($this->table);
    }

    // Hitung semua pesan masuk
    public function count_all()
    {
        return $this->db->count_all_results($this->table);
    }

    public function count_unread()
    {
        return $this->db
            ->where('status', 'unread')
            ->count_all_results($this->table);
    }

    public function update($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update($this->table, $data);
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }
}