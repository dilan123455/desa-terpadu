<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class faq extends CI_Controller
{
    public function index()
    {
        $this->load->view('site/home/faq');
    }
}