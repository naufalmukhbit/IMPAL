<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function validate_data()
	{
		$data = $this->input->post(null,TRUE);
        $login_data = $this->Login_model->validate_data($data);
        if ($login_data) {
            $emp_id = $login_data->emp_id;
            $name = $login_data->name;
            $level = $login_data->level;
            $this->session->set_userdata('emp_id',$emp_id);
            $this->session->set_userdata('name',$name);
            $this->session->set_userdata('level',$level);
            // $pic = $this->Login_model->get_pic($userid);
            // if(empty($pic)) {
            // 	$this->session->set_userdata('userpic','default.png');
            // } else {
            // 	$this->session->set_userdata('userpic',$pic->disp_pic);
            // }
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
            $this->session->set_flashdata('message','login_failed');
            redirect('Login/index');
        }
	}
}
?>