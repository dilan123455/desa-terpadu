<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Implementation_model extends CI_Model
{
    public function get_all()
    {
        return $this->db
            ->order_by('sort_order', 'ASC')
            ->get('implementation_steps')
            ->result();
    }

    public function get_by_id($id)
    {
        return $this->db
            ->where('id', $id)
            ->get('implementation_steps')
            ->row();
    }

    public function update($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update('implementation_steps', $data);
    }

    public function count_all()
{
    return $this->db->count_all('implementation_steps');
}
}