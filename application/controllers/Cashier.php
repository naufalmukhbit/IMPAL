<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cashier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();              
        $this->load->helper('url');
        $this->load->model('Cashier_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = array(
            'title' => 'Data Kasir',
            'data' => $this->Cashier_model->get_data()
            ); 
        $this->load->view("cashier", $data);
    }

    public function t_list()
    {
        $data = array(
            'data' => $this->Cashier_model->get_transaction_data()
        ); 
        $this->load->view('t_list', $data);
    }

    public function report() 
    {
        $this->load->view("cashier_report");
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Welcome/index');
    }
 //    function add(){
 //        $idemployee   = $this->input->post('idemployee');
 //        $name        = $this->input->post('name');
 //        $email    = $this->input->post('email');
 //        $address     = $this->input->post('address');
 //        $phone       = $this->input->post('phone');
 //        $data = array(
 //                'idemployee' => $idemployee,
 //                'name' => $name,
 //                'email' => $email,
 //                'address' => $address,
 //                'phone' => $phone
 //                );

 //        $this->modelkasir->input_data($data,'kasir');
 //        redirect('Kasir_c/index');
        
 //    }

 //    function editData(){
 //        $idemployee   = $this->input->post('idemployee');
 //        $name        = $this->input->post('name');
 //        $email    = $this->input->post('email');
 //        $address     = $this->input->post('address');
 //        $phone       = $this->input->post('phone');
 //        $data = array(
 //                'idemployee' => $idemployee,
 //                'name' => $name,
 //                'email' => $email,
 //                'address' => $address,
 //                'phone' => $phone
 //                );
     
 //        $where = array(
 //            'idemployee' => $idemployee
 //        );
     
 //        $this->modelkasir->update_data($where,$data,'kasir');
 //        redirect('Kasir_c/index');
 //    }

	// function hapus($idemployee){
	// 	$where = array('idemployee' => $idemployee);
	// 	$this->modelkasir->hapus_data($where,'kasir');
	// 	redirect('Montir_c/index');
	// }
}