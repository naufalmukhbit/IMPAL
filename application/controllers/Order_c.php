<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Order_c extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();              
        $this->load->helper('url');
        $this->load->model("modelorder");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = array(
            'title' => 'Data Order',
            'data' => $this->modelorder->get_data()
            ); 
        $this->load->view("crudorder_v", $data);
    }

    function add(){
        $idorder   = $this->input->post('idorder');
        $date         = $this->input->post('date');
        $customername = $this->input->post('customername');
        $ktp          = $this->input->post('ktp');
        $unit_type    = $this->input->post('unit_type');
        $color        = $this->input->post('color');
        $data = array(
                'idorder'    => $idorder,
                'date'          => $date,
                'customername'  => $customername,
                'ktp'           => $ktp,
                'unit_type'     => $unit_type,
                'color'         => $color
                );

        $this->modelorder->input_data($data,'pemesanan');
        redirect('Order_c/index');
        
    }

    function editData(){
        $idorder   = $this->input->post('idorder');
        $date         = $this->input->post('date');
        $customername = $this->input->post('customername');
        $ktp          = $this->input->post('ktp');
        $unit_type    = $this->input->post('unit_type');
        $color        = $this->input->post('color');
        $data = array(
                'idorder'    => $idorder,
                'date'          => $date,
                'customername'  => $customername,
                'ktp'           => $ktp,
                'unit_type'     => $unit_type,
                'color'         => $color
                );
     
        $where = array(
            'idorder' => $idorder
        );
     
        $this->modelorder->update_data($where,$data,'pemesanan');
        redirect('Order_c/index');
    }

	function hapus($idorder){
		$where = array('idorder' => $idemployee);
		$this->modelorder->hapus_data($where,'pemesanan');
		redirect('Order_c/index');
	}
}