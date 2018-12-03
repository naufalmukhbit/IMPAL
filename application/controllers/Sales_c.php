<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_c extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();              
        $this->load->helper('url');
        $this->load->model("modelsales");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = array(
            'title' => 'Data Sales',
            'data' => $this->modelsales->get_data()
            ); 
        $this->load->view("crudsales_v", $data);
    }

    function add(){
        $idemployee   = $this->input->post('idemployee');
        $name        = $this->input->post('name');
        $email    = $this->input->post('email');
        $address     = $this->input->post('address');
        $phone       = $this->input->post('phone');
        $data = array(
                'idemployee' => $idemployee,
                'name' => $name,
                'email' => $email,
                'address' => $address,
                'phone' => $phone
                );

        $this->modelsales->input_data($data,'sales');
        redirect('Sales_c/index');
        
    }

    function editData(){
        $idemployee   = $this->input->post('idemployee');
        $name        = $this->input->post('name');
        $email    = $this->input->post('email');
        $address     = $this->input->post('address');
        $phone       = $this->input->post('phone');
        $data = array(
                'idemployee' => $idemployee,
                'name' => $name,
                'email' => $email,
                'address' => $address,
                'phone' => $phone
                );
     
        $where = array(
            'idemployee' => $idemployee
        );
     
        $this->modelsales->update_data($where,$data,'sales');
        redirect('Sales_c/index');
    }

	function hapus($idemployee){
		$where = array('idemployee' => $idemployee);
		$this->modelsales->hapus_data($where,'sales');
		redirect('Sales_c/index');
	}
}