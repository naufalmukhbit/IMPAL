<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction_c extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();              
        $this->load->helper('url');
        $this->load->model("modeltransaksi");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = array(
            'title' => 'Data Transaction',
            'data' => $this->modeltransaksi->get_data()
            ); 
        $this->load->view("crudtransaksi", $data);
    }

    function add(){
        $idtransaction   = $this->input->post('idtransaction');
        $typetransaction        = $this->input->post('typetransaction');
        $date    = $this->input->post('date');
        $deskripsi     = $this->input->post('deskripsi');
        $price       = $this->input->post('price');
        $data = array(
                'idtransaction' => $idtransaction,
                'typetransaction' => $typetransaction,
                'date' => $date,
                'deskripsi' => $deskripsi,
                'price' => $price
                );

        $this->modeltransaksi->input_data($data,'transaction');
        redirect('Transaction_c/index');
        
    }

    function editData(){
        $idtransaction   = $this->input->post('idtransaction');
        $typetransaction        = $this->input->post('typetransaction');
        $date    = $this->input->post('date');
        $deskripsi     = $this->input->post('deskripsi');
        $price       = $this->input->post('price');
        $data = array(
                'idtransaction' => $idtransaction,
                'typetransaction' => $typetransaction,
                'date' => $date,
                'deskripsi' => $deskripsi,
                'price' => $price
                );
     
        $where = array(
            'idtransaction' => $idtransaction
        );
     
        $this->modeltransaksi->update_data($where,$data,'transaction');
        redirect('Transaction_c/index');
    }

}