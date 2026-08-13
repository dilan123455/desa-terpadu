<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('About_model');
    }

    public function index()
{
    $data['title'] = 'Tentang Desa Terpadu';

    // Informasi utama
    $data['about'] = $this->About_model->get_about();

    // Slide About
    $data['slides'] = $this->About_model->get_slides();

    // Manfaat About
    $data['benefits'] = $this->About_model->get_benefits();

    $this->load->view('admin/about/index', $data);
}





    public function store()
    {
        // Cegah pembuatan data kedua
        $about = $this->About_model->get_about();

        if (!empty($about)) {
            redirect('admin/about/edit');
        }

        $data = array(
            'title'       => $this->input->post('title', TRUE),
            'description' => $this->input->post('description', TRUE)
        );

        $this->About_model->insert_about($data);

        redirect('admin/about');
    }


    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */

    public function edit()
    {
        $data['title'] = 'Edit Tentang Desa Terpadu';
        $data['about'] = $this->About_model->get_about();

        // Kalau belum ada data, arahkan ke Create
        if (empty($data['about'])) {
            redirect('admin/about/create');
        }

        $this->load->view('admin/about/edit', $data);
    }


    public function update()
    {
        $about = $this->About_model->get_about();

        if (empty($about)) {
            redirect('admin/about/create');
        }

        $data = array(
            'title'       => $this->input->post('title', TRUE),
            'description' => $this->input->post('description', TRUE)
        );

        $this->About_model->update_about($about->id, $data);

        redirect('admin/about');
    }

    public function slide_create()
{
    $data['title'] = 'Tambah Slide About';

    $this->load->view('admin/about/slide_create', $data);
}

public function slide_store()
{
    $image = '';

    if (!empty($_FILES['image']['name'])) {

        $config['upload_path'] = './assets/uploads/about/';
        $config['allowed_types'] = 'jpg|jpeg|png|webp';
        $config['max_size'] = 5120;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {

            $this->session->set_flashdata(
                'error',
                $this->upload->display_errors()
            );

            redirect('admin/about/slide_create');
        }

        $upload = $this->upload->data();

        $image = $upload['file_name'];
    }

    $data = array(
        'title'      => $this->input->post('title', TRUE),
        'image'      => $image,
        'sort_order' => $this->input->post('sort_order', TRUE)
    );

    $this->db->insert('about_slides', $data);

    redirect('admin/about');
}
    public function edit_slide($id)
{
    $data['title'] = 'Edit Slide About';
    $data['slide'] = $this->About_model->get_slide_by_id($id);

    if (empty($data['slide'])) {
        show_404();
    }

    $this->load->view('admin/about/edit_slide', $data);
}


public function update_slide($id)
{
    $slide = $this->About_model->get_slide_by_id($id);

    if (empty($slide)) {
        show_404();
    }

    $data = array(
        'title'      => $this->input->post('title', TRUE),
        'sort_order' => $this->input->post('sort_order', TRUE)
    );

    // Upload gambar jika admin memilih gambar baru
    if (!empty($_FILES['image']['name'])) {

        $config['upload_path']   = './assets/uploads/about/';
        $config['allowed_types'] = 'jpg|jpeg|png|webp';
        $config['max_size']      = 5120;
        $config['file_name']     = time() . '_' . $_FILES['image']['name'];

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {

            $this->session->set_flashdata(
                'error',
                $this->upload->display_errors()
            );

            redirect('admin/about/edit_slide/' . $id);
        }

        $upload = $this->upload->data();

        $data['image'] = $upload['file_name'];
    }

    $this->About_model->update_slide($id, $data);

    redirect('admin/about');
}

public function slide_delete($id)
{
    $slide = $this->About_model->get_slide_by_id($id);

    if (!empty($slide)) {

        $this->About_model->delete_slide($id);
    }

    redirect('admin/about');
}

    // =====================================================
    // BENEFITS
    // =====================================================

    public function benefits()
    {
        $data['title'] =
            'Manfaat About';

        $data['benefits'] =
            $this->About_model->get_benefits();

        $this->load->view(
            'admin/about/benefits/index',
            $data
        );
    }


    public function benefit_create()
    {
        $data['title'] =
            'Tambah Manfaat';

        $this->load->view(
            'admin/about/benefits/create',
            $data
        );
    }


    public function benefit_store()
    {
        $data = array(
            'title' =>
                $this->input->post(
                    'title',
                    TRUE
                ),

            'description' =>
                $this->input->post(
                    'description',
                    TRUE
                ),

            'sort_order' =>
                $this->input->post(
                    'sort_order',
                    TRUE
                )
        );


        $this->About_model
            ->insert_benefit($data);


        redirect('admin/about/benefits');
    }


    public function benefit_edit($id)
    {
        $benefit =
            $this->About_model
                ->get_benefit_by_id($id);

        if (empty($benefit)) {
            show_404();
        }


        $data['title'] =
            'Edit Manfaat';

        $data['benefit'] =
            $benefit;


        $this->load->view(
            'admin/about/benefits/edit',
            $data
        );
    }


    public function benefit_update($id)
    {
        $benefit =
            $this->About_model
                ->get_benefit_by_id($id);

        if (empty($benefit)) {
            show_404();
        }


        $data = array(
            'title' =>
                $this->input->post(
                    'title',
                    TRUE
                ),

            'description' =>
                $this->input->post(
                    'description',
                    TRUE
                ),

            'sort_order' =>
                $this->input->post(
                    'sort_order',
                    TRUE
                )
        );


        $this->About_model
            ->update_benefit(
                $id,
                $data
            );


        redirect('admin/about/benefits');
    }


    public function benefit_delete($id)
    {
        $benefit =
            $this->About_model
                ->get_benefit_by_id($id);

        if (empty($benefit)) {
            show_404();
        }


        $this->About_model
            ->delete_benefit($id);


        redirect('admin/about/benefits');
    }


    }
