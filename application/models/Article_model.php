<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article_model extends CI_Model
{
    private $table = 'articles';

    // ==========================================
    // METHOD UNTUK ADMIN (BACKEND - CRUD)
    // ==========================================

    // Ambil semua data artikel (untuk admin index)
    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }

    // Ambil data berdasarkan ID (untuk admin edit)
    public function get_by_id($id)
    {
        return $this->db->where('id', $id)->get($this->table)->row();
    }

    // Simpan data baru (untuk admin store)
    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // Update data (untuk admin update)
    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update($this->table, $data);
    }

    // Hapus data (untuk admin delete)
    public function delete($id)
    {
        return $this->db->where('id', $id)->delete($this->table);
    }


    // ==========================================
    // METHOD UNTUK PUBLIK (FRONTEND - VIEWER)
    // ==========================================

    // Ambil artikel yang sudah dipublish (bisa dibatasi jumlahnya)
    public function get_published($limit = null)
    {
        $this->db->select('articles.*, users.name AS author_name');
        $this->db->from($this->table);
        $this->db->join('users', 'users.id = articles.author_id', 'left');
        $this->db->where('articles.status', 'published');
        $this->db->order_by('articles.published_at', 'DESC');
        
        if ($limit) {
            $this->db->limit($limit);
        }
        
        return $this->db->get()->result();
    }

    // Ambil detail artikel berdasarkan slug
    public function get_by_slug($slug)
    {
        return $this->db
            ->select('articles.*, users.name AS author_name')
            ->from($this->table)
            ->join('users', 'users.id = articles.author_id', 'left')
            ->where('articles.slug', $slug)
            ->where('articles.status', 'published')
            ->get()
            ->row();
    }

    // Ambil Related Posts berdasarkan Kategori yang sama
    public function get_related($category, $current_id, $limit = 2)
    {
        $this->db->select('articles.*, users.name AS author_name');
        $this->db->from($this->table);
        $this->db->join('users', 'users.id = articles.author_id', 'left');
        $this->db->where('articles.status', 'published');
        $this->db->where('articles.category', $category);
        $this->db->where('articles.id !=', $current_id);
        $this->db->order_by('RAND()'); // Mengacak rekomendasi
        $this->db->limit($limit);
        
        return $this->db->get()->result();
    }
}
?>