<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Register_model');
	}

	public function index()
	{
		$this->load->view('register');
	}

	public function add_data()
	{
		$data = $this->input->post(null,TRUE);
		if ($data['password'] != $data['confirm']) {
			$this->session->set_flashdata('error','password_wrong');
            redirect('Register/index');
		} else {
			$add_account = $this->Register_model->add_data($data);
	        if($add_account) {
	            $this->session->set_userdata('name', $data['name']);
	            $this->session->set_userdata('emp_id', $data['emp_id']);
	            $this->session->set_userdata('level', $data['position']);
	            $level = $data['position'];
	            if ($level == 1) {
	            	redirect('Manager/index');
	            } else if ($level == 2) {
	                redirect('Mechanic/index');
	            } else if ($level == 3) {
	                redirect('Accounting/index');
	            } else if ($level == 4) {
	                redirect('Stock/index');
	            } else if ($level == 5) {
	                redirect('Cashier/index');
	            } else if ($level == 6) {
	                redirect('Operator/index');
	            } else if ($level == 7) {
	                redirect('Sales/index');
	            } else if ($level == 0) {
	                redirect('Admin/index');
	            } else {
	            	redirect('Welcome/index');
	        	}
	        } else {
	        	$this->session->set_flashdata('error','username_taken');
	            redirect('Register/index');
	        }
		}
	}
}
?>