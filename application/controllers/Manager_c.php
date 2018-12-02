<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Manager_c extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();              
        $this->load->helper('url');
        $this->load->model("modelmanager");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = array(
            'title' => 'Data Manager',
            'data' => $this->modelmanager->get_data()
            ); 
        $this->load->view("crudmanager_v", $data);
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

        $this->modelmanager->input_data($data,'manajer');
        redirect('Manager_c/index');
        
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
     
        $this->modelmanager->update_data($where,$data,'manajer');
        redirect('Manager_c/index');
    }

	function hapus($idemployee){
		$where = array('idemployee' => $idemployee);
		$this->modelmanager->hapus_data($where,'manajer');
		redirect('Manager_c/index');
	}
}