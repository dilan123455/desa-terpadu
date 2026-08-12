<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About_model extends CI_Model
{
    public function get_about()
    {
        return $this->db
            ->get('about')
            ->row();
    }

    public function get_slides()
    {
        return $this->db
            ->order_by('sort_order', 'ASC')
            ->get('about_slides')
            ->result();
    }

    public function get_benefits()
    {
        return $this->db
            ->order_by('sort_order', 'ASC')
            ->get('about_benefits')
            ->result();
    }

    public function insert_about($data)
{
    return $this->db->insert('about', $data);
}


public function update_about($id, $data)
{
    $this->db->where('id', $id);
    return $this->db->update('about', $data);
}
}