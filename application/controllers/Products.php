<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Product_model');
    }

    public function index()
    {
        $search = $this->input->get('search');
        $data['products'] = $this->Product_model->get_all($search);
        $this->load->view('products/index', $data);
    }

    public function create()
    {
        $this->load->view('products/form');
    }

    public function store()
    {
        $this->Product_model->insert($this->input->post());
        redirect('products');
    }

    public function edit($id)
    {
        $data['product'] = $this->Product_model->get_by_id($id);
        $this->load->view('products/form', $data);
    }

    public function update($id)
    {
        $this->Product_model->update($id, $this->input->post());
        redirect('products');
    }

    public function delete($id)
    {
        $this->Product_model->delete($id);
        redirect('products');
    }

    public function kalkulator()
    {
        $this->load->view('products/kalkulator');
    }
}
