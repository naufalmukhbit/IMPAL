<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Montir_c extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();              
        $this->load->helper('url');
        $this->load->model("modelmontir");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = array(
            'title' => 'Data Montir',
            'data' => $this->modelmontir->get_data()
            ); 
        $this->load->view("crudmontir_v", $data);
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

        $this->modelmontir->input_data($data,'montir');
        redirect('Montir_c/index');
        
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
     
        $this->modelmontir->update_data($where,$data,'montir');
        redirect('Montir_c/index');
    }

	function hapus($idemployee){
		$where = array('idemployee' => $idemployee);
		$this->modelmontir->hapus_data($where,'montir');
		redirect('Montir_c/index');
	}
}