<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Features_model extends CI_Model
{
    public function get_platforms()
    {
        return $this->db
            ->order_by('sort_order', 'ASC')
            ->get('feature_platforms')
            ->result();
    }

    public function get_platform($id)
    {
        return $this->db
            ->where('id', $id)
            ->get('feature_platforms')
            ->row();
    }

    public function get_items($platform_id)
    {
        return $this->db
            ->where('platform_id', $platform_id)
            ->order_by('sort_order', 'ASC')
            ->get('feature_items')
            ->result();
    }

    public function get_all_items()
    {
        return $this->db
            ->select('feature_items.*, feature_platforms.name AS platform_name')
            ->from('feature_items')
            ->join(
                'feature_platforms',
                'feature_platforms.id = feature_items.platform_id'
            )
            ->order_by('feature_platforms.sort_order', 'ASC')
            ->order_by('feature_items.sort_order', 'ASC')
            ->get()
            ->result();
    }

    public function update_platform($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update('feature_platforms', $data);
    }

    public function update_item($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update('feature_items', $data);
    }
}