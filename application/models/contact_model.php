<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model
{
    private $table = 'contact';

    public function get_contact()
    {
        return $this->db
            ->get($this->table)
            ->row();
    }

    public function update_contact($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update($this->table, $data);
    }
}