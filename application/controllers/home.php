<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $this->load->model('Testimoni_model');
        $this->load->model('Article_model');
        $this->load->model('About_model');
        $this->load->model('Faq_model');
        $this->load->model('Implementation_model');

        // Testimoni
        $data['testimonials'] =
            $this->Testimoni_model->get_active();

        // Artikel
        $data['articles'] =
            $this->Article_model->get_published();

        // About
        $data['about'] =
            $this->About_model->get_about();

        // Slide About
        $data['slides'] =
            $this->About_model->get_slides();

        // Benefit About
        $data['benefits'] =
            $this->About_model->get_benefits();

        // Implementation
        $data['implementations'] =
            $this->Implementation_model->get_all();

        // FAQ
        $data['faqs'] =
            $this->Faq_model->get_active();

        $this->load->view('site/home', $data);
    }
}