<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase_c extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();              
        $this->load->helper('url');
        $this->load->model("modelpurchase");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = array(
            'title' => 'Data purchase',
            'data' => $this->modelpurchase->get_data()
            ); 
        $this->load->view("crudpurchase_view", $data);
    }

    function add(){
        $idpurchase   = $this->input->post('idpurchase');
        $typepurchase = $this->input->post('typepurchase');
        $date         = $this->input->post('date');
        $customername = $this->input->post('customername');
        $ktp          = $this->input->post('ktp');
        $unit_type    = $this->input->post('unit_type');
        $color        = $this->input->post('color');
        $price        = $this->input->post('price');
        $data = array(
                'idpurchase'    => $idpurchase,
                'typepurchase'  => $typepurchase,
                'date'          => $date,
                'customername'  => $customername,
                'ktp'           => $ktp,
                'unit_type'     => $unit_type,
                'color'         => $color,
                'price'         => $price
                );

        $this->modelpurchase->input_data($data,'purchase');
        redirect('Purchase_c/index');
    }

    function editData(){
        $idpurchase   = $this->input->post('idpurchase');
        $typepurchase = $this->input->post('typepurchase');
        $date         = $this->input->post('date');
        $customername = $this->input->post('customername');
        $ktp          = $this->input->post('ktp');
        $unit_type    = $this->input->post('unit_type');
        $color        = $this->input->post('color');
        $price        = $this->input->post('price');
        $data = array(
                'idpurchase'    => $idpurchase,
                'typepurchase'  => $typepurchase,
                'date'          => $date,
                'customername'  => $customername,
                'ktp'           => $ktp,
                'unit_type'     => $unit_type,
                'color'     => $color,
                'price'     => $price);
     
        $where = array(
            'idpurchase' => $idpurchase
        );
     
        $this->modelpurchase->update_data($where,$data,'purchase');
        redirect('Purchase_c/index');
    }

	function hapus($idpurchase){
		$where = array('idpurchase' => $idpurchase);
		$this->modelpurchase->hapus_data($where,'purchase');
		redirect('Purchase_c/index');
	}
}