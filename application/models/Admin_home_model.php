<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_home_model extends CI_Model
{
    /*
    |--------------------------------------------------------------------------
    | HERO
    |--------------------------------------------------------------------------
    */

    public function get_hero()
    {
        return $this->db
            ->get('home_hero')
            ->row();
    }

    public function update_hero($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update('home_hero', $data);
    }


    /*
    |--------------------------------------------------------------------------
    | CHALLENGES / TANTANGAN DESA
    |--------------------------------------------------------------------------
    */

    public function get_challenges()
    {
        return $this->db
            ->order_by('sort_order', 'ASC')
            ->get('home_challenges')
            ->result();
    }

    public function get_challenge($id)
    {
        return $this->db
            ->where('id', $id)
            ->get('home_challenges')
            ->row();
    }

    public function update_challenge($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update('home_challenges', $data);
    }

    public function create_challenge($data)
{
    return $this->db
        ->insert('home_challenges', $data);
}

public function delete_challenge($id)
{
    return $this->db
        ->where('id', $id)
        ->delete('home_challenges');
}
}