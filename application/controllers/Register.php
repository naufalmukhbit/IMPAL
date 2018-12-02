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
        $add_account = $this->Register_model->add_account($data);
        if($add_account) {
            $this->session->set_flashdata('name', $data['name']);
            $id = $this->Register_model->get_id($data['username']);
            $this->session->set_userdata('userid',$id->userid);
            redirect('Manager/index');
        } else {
        	$this->session->set_flashdata('error','username_taken');
            redirect('Register/index');
        }
	}
}
?>