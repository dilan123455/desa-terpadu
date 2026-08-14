<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Password_reset_model extends CI_Model
{
    private $table = 'password_resets';

    /**
     * Membuat token reset baru
     */
    public function create($data)
    {
        return $this->db->insert($this->table, $data);
    }

    /**
     * Hapus semua token milik user
     */
    public function delete_by_user($user_id)
    {
        return $this->db
            ->where('user_id', $user_id)
            ->delete($this->table);
    }

    /**
     * Cari token yang masih berlaku
     */
    public function get_by_token($token)
    {
        return $this->db
            ->where('token', $token)
            ->where('expires_at >=', date('Y-m-d H:i:s'))
            ->get($this->table)
            ->row();
    }

    /**
     * Hapus token setelah berhasil digunakan
     */
    public function delete_by_token($token)
    {
        return $this->db
            ->where('token', $token)
            ->delete($this->table);
    }
}