<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Accounting extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();              
        $this->load->helper('url');
        $this->load->model("Accounting_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = array(
            'title' => 'Data Bendahara',
            'data' => $this->Accounting_model->get_data()
            ); 
        $this->load->view("accounting", $data);
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

        $this->modelbendahara->input_data($data,'bendahara');
        redirect('Acounting/index');
        
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
     
        $this->modelbendahara->update_data($where,$data,'bendahara');
        redirect('Accounting/index');
    }

	function hapus($idemployee){
		$where = array('idemployee' => $idemployee);
		$this->modelbendahara->hapus_data($where,'bendahara');
		redirect('Accounting/index');
	}

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Welcome/index');
    }
}