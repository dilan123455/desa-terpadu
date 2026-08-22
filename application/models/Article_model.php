<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article_model extends CI_Model
{
    private $table = 'articles';

    // ==========================================
    // METHOD UNTUK ADMIN (BACKEND - CRUD)
    // ==========================================

    /**
     * Ambil semua data artikel (untuk admin index)
     * Diurutkan dari yang paling baru berdasarkan tanggal publish
     */
    public function get_all()
    {
        $this->db->order_by('publish_date', 'DESC'); // terbaru berdasarkan tanggal publish
        $this->db->order_by('id', 'DESC');           // jika tanggal sama, urutkan berdasarkan ID terbaru
        return $this->db->get($this->table)->result();
    }

    /**
     * Ambil data berdasarkan ID (untuk admin edit)
     */
    public function get_by_id($id)
    {
        return $this->db->where('id', $id)->get($this->table)->row();
    }

    /**
     * Simpan data baru (untuk admin store)
     * Data yang dikirim harus sudah berisi publish_date
     */
    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    /**
     * Update data (untuk admin update)
     */
    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update($this->table, $data);
    }

    /**
     * Hapus data (untuk admin delete)
     */
    public function delete($id)
    {
        return $this->db->where('id', $id)->delete($this->table);
    }

    /**
     * Hitung semua data artikel
     */
    public function count_all()
    {
        return $this->db->count_all_results($this->table);
    }

    // ==========================================
    // METHOD UNTUK PUBLIK (FRONTEND - VIEWER)
    // ==========================================

    /**
     * Ambil artikel yang sudah dipublish (bisa dibatasi jumlahnya)
     * 
     * Diurutkan berdasarkan publish_date (tanggal upload) terbaru.
     * Jika kolom publish_date kosong, bisa fallback ke created_at atau id.
     */
    public function get_published($limit = null)
    {
        $this->db->select('articles.*, users.name AS author_name');
        $this->db->from($this->table);
        $this->db->join('users', 'users.id = articles.author_id', 'left');
        $this->db->where('articles.status', 'published');
        $this->db->order_by('articles.publish_date', 'DESC'); // Ganti ke publish_date
        $this->db->order_by('articles.id', 'DESC');            // Fallback jika tanggal sama
        
        if ($limit) {
            $this->db->limit($limit);
        }
        
        return $this->db->get()->result();
    }

    /**
     * Ambil detail artikel berdasarkan slug
     */
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

    /**
     * Ambil Related Posts berdasarkan Kategori yang sama
     */
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

    // ==========================================
    // METHOD UNTUK PREV / NEXT ARTIKEL
    // ==========================================

    /**
     * Artikel sebelumnya (berdasarkan publish_date dan id)
     */
    public function get_prev_article($current_id)
    {
        $current = $this->db->where('id', $current_id)->get($this->table)->row();
        if (!$current) {
            return null;
        }

        $this->db->select('articles.*, users.name AS author_name');
        $this->db->from($this->table);
        $this->db->join('users', 'users.id = articles.author_id', 'left');
        $this->db->where('articles.status', 'published');

        $this->db->group_start();
        $this->db->where('articles.publish_date <', $current->publish_date);
        $this->db->or_group_start();
        $this->db->where('articles.publish_date', $current->publish_date);
        $this->db->where('articles.id <', $current_id);
        $this->db->group_end();
        $this->db->group_end();

        $this->db->order_by('articles.publish_date', 'DESC');
        $this->db->order_by('articles.id', 'DESC');
        $this->db->limit(1);

        return $this->db->get()->row();
    }

    /**
     * Artikel berikutnya (berdasarkan publish_date dan id)
     */
    public function get_next_article($current_id)
    {
        $current = $this->db->where('id', $current_id)->get($this->table)->row();
        if (!$current) {
            return null;
        }

        $this->db->select('articles.*, users.name AS author_name');
        $this->db->from($this->table);
        $this->db->join('users', 'users.id = articles.author_id', 'left');
        $this->db->where('articles.status', 'published');

        $this->db->group_start();
        $this->db->where('articles.publish_date >', $current->publish_date);
        $this->db->or_group_start();
        $this->db->where('articles.publish_date', $current->publish_date);
        $this->db->where('articles.id >', $current_id);
        $this->db->group_end();
        $this->db->group_end();

        $this->db->order_by('articles.publish_date', 'ASC');
        $this->db->order_by('articles.id', 'ASC');
        $this->db->limit(1);

        return $this->db->get()->row();
    }
}