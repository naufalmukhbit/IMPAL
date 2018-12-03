<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Manager_model');
	}

	public function index()
	{
		// $emp_id = $this->session->userdata('emp_id');
		// $data = $this->Manager_model->get_name($emp_id);
		// $data = array(
		// 	'name' => $this->Manager_model->get_name($emp_id)
		// );
		$this->load->view('manager');
	}

    public function manage_employee()
    {
    	// $emp_id = $this->session->userdata('emp_id');
    	// $data_temp = $this->Manager_model->get_data()
		$data = array(
            'data' => $this->Manager_model->get_data()
        ); 
        $this->load->view('manage_employee', $data);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Welcome/index');
    }
}