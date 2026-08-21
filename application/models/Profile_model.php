<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model
{
    /*
    |--------------------------------------------------------------------------
    | USER / PROFILE
    |--------------------------------------------------------------------------
    */

    public function get_user($user_id)
    {
        return $this->db
            ->where('id', $user_id)
            ->get('users')
            ->row();
    }


    public function update_user($user_id, $data)
    {
        return $this->db
            ->where('id', $user_id)
            ->update('users', $data);
    }


    /*
    |--------------------------------------------------------------------------
    | LOGO
    |--------------------------------------------------------------------------
    */

    /**
     * Ambil nama file logo yang sedang digunakan.
     *
     * Semua logo berada di:
     * assets/uploads/logo/
     *
     * Tidak harus bernama logo.png.
     */
    public function get_logo()
    {
        $folder = FCPATH . 'assets/uploads/logo/';

        if (!is_dir($folder)) {
            return null;
        }

        $files = glob($folder . '*');

        if (!$files) {
            return null;
        }

        $allowed_extensions = [
            'jpg',
            'jpeg',
            'png',
            'webp'
        ];

        $logo_files = [];

        foreach ($files as $file) {

            if (!is_file($file)) {
                continue;
            }

            $extension = strtolower(
                pathinfo($file, PATHINFO_EXTENSION)
            );

            if (in_array($extension, $allowed_extensions, true)) {
                $logo_files[] = $file;
            }
        }

        if (empty($logo_files)) {
            return null;
        }

        /*
        |--------------------------------------------------------------------------
        | Ambil file logo terbaru
        |--------------------------------------------------------------------------
        */

        usort(
            $logo_files,
            function ($a, $b) {
                return filemtime($b) <=> filemtime($a);
            }
        );

        return basename($logo_files[0]);
    }


    /**
     * Ambil URL logo aktif.
     */
    public function get_logo_url()
    {
        $filename = $this->get_logo();

        if (!$filename) {
            return null;
        }

        $path =
            FCPATH .
            'assets/uploads/logo/' .
            $filename;

        if (!file_exists($path)) {
            return null;
        }

        /*
        |--------------------------------------------------------------------------
        | Cache breaker
        |--------------------------------------------------------------------------
        */

        $version = filemtime($path);

        return base_url(
            'assets/uploads/logo/' .
            rawurlencode($filename) .
            '?v=' .
            $version
        );
    }
}