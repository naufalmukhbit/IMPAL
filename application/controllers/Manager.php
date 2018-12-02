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
		$this->load->view('sidebar_manager');
	}

    public function manage_employee()
    {
        $this->load->view('manage_employee');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Welcome/index');
    }
}