<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('welcome_model');
	}

	public function index()
	{
		if ($this->session->userdata('level') != "") {
			$level = $this->session->userdata('level');
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
                redirect('Cashier/index');
            } else {
            	redirect('Welcome/index');
        	}
		} else {
			$this->load->view('welcome_screen');
		}
	}
}
