<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Testimoni_model extends CI_Model
{
    private $table = 'testimonials';
 
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
 
    // Dipakai frontend (Home) buat nampilin testimoni aktif
    public function get_active()
    {
        $this->db->from($this->table);

        if ($this->db->field_exists('status', $this->table)) {
            $this->db->where('status', 'active');
        } else {
            $this->db->where('is_active', 1);
        }

        return $this->db
            ->order_by('created_at', 'DESC')
            ->get()
            ->result();
    }

    public function count_all()
{
    return $this->db->count_all('testimonials');
}
}