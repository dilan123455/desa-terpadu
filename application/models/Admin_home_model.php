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

    public function create_challenge($data)
    {
        return $this->db->insert('home_challenges', $data);
    }

    public function delete_challenge($id)
    {
        return $this->db
            ->where('id', $id)
            ->delete('home_challenges');
    }

    /**
     * Mendapatkan nomor urut berikutnya (max + 1)
     */
    public function get_next_sort_order()
    {
        $row = $this->db
            ->select_max('sort_order')
            ->get('home_challenges')
            ->row();

        return ((int) $row->sort_order) + 1;
    }

    /**
     * Update challenge dengan logika reorder otomatis
     * Jika sort_order baru sudah dipakai, data lain akan digeser.
     */
    public function update_challenge_with_order($id, $data)
    {
        $this->db->trans_begin();

        $current = $this->get_challenge($id);
        if (!$current) {
            $this->db->trans_rollback();
            return FALSE;
        }

        $old_order = (int) $current->sort_order;
        $new_order = (int) $data['sort_order'];

        // Geser data lain jika perlu
        if ($new_order < $old_order) {
            // Urutan baru lebih kecil, geser data antara new_order dan old_order ke atas
            $this->db
                ->where('sort_order >=', $new_order)
                ->where('sort_order <', $old_order)
                ->set('sort_order', 'sort_order + 1', FALSE)
                ->update('home_challenges');
        } elseif ($new_order > $old_order) {
            // Urutan baru lebih besar, geser data antara old_order dan new_order ke bawah
            $this->db
                ->where('sort_order >', $old_order)
                ->where('sort_order <=', $new_order)
                ->set('sort_order', 'sort_order - 1', FALSE)
                ->update('home_challenges');
        }

        // Update data yang sedang diedit
        $this->db
            ->where('id', $id)
            ->update('home_challenges', $data);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        } else {
            $this->db->trans_commit();
            return TRUE;
        }
    }
}