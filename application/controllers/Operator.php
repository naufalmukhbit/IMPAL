<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Operator extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();              
        $this->load->helper('url');
        $this->load->model("Operator_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = array(
            'title' => 'Data OP Gudang',
            'data' => $this->Operator_model->get_data()
            ); 
        $this->load->view("operator", $data);
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

        $this->modelopgudang->input_data($data,'opgudang');
        redirect('Operator/index');
        
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
     
        $this->modelopgudang->update_data($where,$data,'opgudang');
        redirect('Operator/index');
    }

	function hapus($idemployee){
		$where = array('idemployee' => $idemployee);
		$this->modelopgudang->hapus_data($where,'opgudang');
		redirect('Operator/index');
	}

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Welcome/index');
    }
}