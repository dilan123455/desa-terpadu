<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller
{
    public function index()
    {
        $this->load->model('Testimoni_model');

        $data['testimonials'] = $this->Testimoni_model->get_active();

        $this->load->view('site/home', $data);
    }
}