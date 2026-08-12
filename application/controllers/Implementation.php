<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Implementation extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Implementation_model');
    }

    public function index()
    {
        $data['implementation_steps'] =
            $this->Implementation_model->get_all();

        $this->load->view(
            'site/home/implementation',
            $data
        );
    }
}