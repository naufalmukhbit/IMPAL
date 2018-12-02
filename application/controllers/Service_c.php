<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Service_c extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();              
        $this->load->helper('url');
        $this->load->model("modelservice");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = array(
            'title' => 'Data obat',
            'data' => $this->modelservice->get_data()
            ); 
        $this->load->view("viewcrudservice", $data);
    }

    function add(){
        $idservice   = $this->input->post('idservice');
        $type        = $this->input->post('type');
        $customer    = $this->input->post('customer');
        $tanggal     = $this->input->post('tanggal');
        $price       = $this->input->post('price');
        $data = array(
                'idservice' => $idservice,
                'type' => $type,
                'customer' => $customer,
                'tanggal' => $tanggal,
                'price' => $price
                );

        $this->modelservice->input_data($data,'service');
        redirect('Service_c/index');
        
    }

    function editData(){
        $idservice   = $this->input->post('idservice');
        $type        = $this->input->post('type');
        $customer    = $this->input->post('customer');
        $tanggal     = $this->input->post('tanggal');
        $price       = $this->input->post('price');
        $data = array(
                'idservice' => $idservice,
                'type' => $type,
                'customer' => $customer,
                'tanggal' => $tanggal,
                'price' => $price
                );
     
        $where = array(
            'idservice' => $idservice
        );
     
        $this->modelservice->update_data($where,$data,'service');
        redirect('Service_c/index');
    }

	function hapus($idservice){
		$where = array('idservice' => $idservice);
		$this->modelservice->hapus_data($where,'service');
		redirect('Service_c/index');
	}
}