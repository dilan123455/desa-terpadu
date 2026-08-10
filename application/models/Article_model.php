<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article_model extends CI_Model
{
    private $table = 'articles';

    public function get_all()
    {
        return $this->db
            ->select('articles.*, users.name AS author_name')
            ->from($this->table)
            ->join('users', 'users.id = articles.author_id', 'left')
            ->order_by('articles.created_at', 'DESC')
            ->get()
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
}