<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        // Load semua model yang dibutuhkan halaman utama
        $this->load->model('Testimoni_model');
        $this->load->model('Article_model');
        $this->load->model('About_model');
        $this->load->model('Faq_model');
        $this->load->model('Implementation_model');
        $this->load->model('Features_model');
        $this->load->model('Contact_model');
       

        // HOME ADMIN
         $this->load->model('Admin_home_model');
        $data['hero'] =
    $this->Admin_home_model->get_hero();

$data['challenges'] =
    $this->Admin_home_model->get_challenges();
      
        // ==========================================
        // TESTIMONI
        // ==========================================

        $data['testimonials'] =
            $this->Testimoni_model->get_active();


        // ==========================================
        // ARTIKEL
        // ==========================================

        $data['articles'] =
            $this->Article_model->get_published();


        // ==========================================
        // ABOUT
        // ==========================================

        $data['about'] =
            $this->About_model->get_about();


        // Slide About
        $data['slides'] =
            $this->About_model->get_slides();


        // Benefit About
        $data['benefits'] =
            $this->About_model->get_benefits();


        // ==========================================
        // FEATURES
        // ==========================================

        $data['platforms'] =
            $this->Features_model->get_platforms();

        $data['items'] =
            $this->Features_model->get_all_items();


        // ==========================================
        // IMPLEMENTATION
        // ==========================================

        $data['implementations'] =
            $this->Implementation_model->get_all();


        // ==========================================
        // FAQ
        // ==========================================

        $data['faqs'] =
            $this->Faq_model->get_active();


        // ==========================================
        // CONTACT
        // ==========================================

        $data['contact'] =
            $this->Contact_model->get_contact();
    
        // ==========================================
        // LOAD HOME
        // ==========================================

        $this->load->view(
            'site/home',
            $data
        );
  
    }
  // ==========================================
// ==========================================
// PRIVACY POLICY
// ==========================================
public function privacy_policy()
{
    $this->load->model('Privacy_policy_model');
    $this->load->model('Contact_model'); 

    $data['privacy_policies'] = $this->Privacy_policy_model->get_all();
    $data['contact'] = $this->Contact_model->get_contact();

    $this->load->view('site/home/Privacy&Policy', $data);
}
}