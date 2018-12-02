<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_c extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();              
        $this->load->helper('url');
        $this->load->model("modelstock");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = array(
            'title' => 'Data stock',
            'data' => $this->modelstock->get_data()
            ); 
        $this->load->view("crudstock_view", $data);
    }

    function add(){
        $idstock   = $this->input->post('idstock');
        $unit_type   = $this->input->post('unit_type');
        $idcar       = $this->input->post('idcar');
        $color       = $this->input->post('color');
        $quantity    = $this->input->post('quantity');
        $price       = $this->input->post('price');
        $data = array(
                'idstock'   => $idstock,
                'unit_type' => $unit_type,
                'idcar'     => $idcar,
                'color'     => $color,
                'quantity'  => $quantity,
                'price'     => $price
                );

        $this->modelstock->input_data($data,'stock');
        redirect('Stock_c/index');
        
    }

    function editData(){
        $idstock     = $this->input->post('idstock');
        $unit_type   = $this->input->post('unit_type');
        $idcar       = $this->input->post('idcar');
        $color       = $this->input->post('color');
        $quantity    = $this->input->post('quantity');
        $price       = $this->input->post('price');
        $data = array(
                'idstock' => $idstock,
                'unit_type' => $unit_type,
                'idcar' => $idcar,
                'color' => $color,
                'quantity' => $quantity,
                'price' => $price
                );
     
        $where = array(
            'idstock' => $idstock
        );
     
        $this->modelstock->update_data($where,$data,'stock');
        redirect('Stock_c/index');
    }

	function hapus($idstock){
		$where = array('idstock' => $idstock);
		$this->modelstock->hapus_data($where,'stock');
		redirect('Stock_c/index');
	}
}