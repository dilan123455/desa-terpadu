<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class About_model extends CI_Model
{
    // ==========================================
    // ABOUT UTAMA
    // ==========================================

    public function get_about()
    {
        return $this->db
            ->get('about')
            ->row();
    }

    public function insert_about($data)
    {
        return $this->db->insert('about', $data);
    }

    public function update_about($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update('about', $data);
    }


    // ==========================================
    // SLIDE ABOUT
    // ==========================================

    public function get_slides()
    {
        return $this->db
            ->order_by('sort_order', 'ASC')
            ->get('about_slides')
            ->result();
    }

    public function get_slide_by_id($id)
    {
        return $this->db
            ->where('id', $id)
            ->get('about_slides')
            ->row();
    }

    public function update_slide($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update('about_slides', $data);
    }

    public function delete_slide($id)
    {
        return $this->db
            ->where('id', $id)
            ->delete('about_slides');
    }


    public function get_benefits()
    {
        return $this->db
            ->order_by('sort_order', 'ASC')
            ->get('about_benefits')
            ->result();
    }

    public function get_benefit_by_id($id)
    {
        return $this->db
            ->where('id', $id)
            ->get('about_benefits')
            ->row();
    }

    public function insert_benefit($data)
    {
        return $this->db->insert('about_benefits', $data);
    }

    public function update_benefit($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update('about_benefits', $data);
    }

    public function delete_benefit($id)
    {
        return $this->db
            ->where('id', $id)
            ->delete('about_benefits');
    }

    
}