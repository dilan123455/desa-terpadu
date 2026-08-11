<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class features extends CI_Controller
{
    public function index()
    {
        $this->load->view('site/home/features');
    }
}