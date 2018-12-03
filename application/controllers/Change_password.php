<?php
class Change_password extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ChangePassword_model');
	}

	public function index()
	{
		$data = array(
			'title' => 'Change Your Password',
			'filename' => 'change_password'
		);
		$this->load->view('change_password',$data);
	}

	public function edit()
	{
		$data = $this->input->post(null,TRUE);
		$edit_password = $this->ChangePassword_model->edit($data['old-pass'],$data['new-pass']);
		if ($edit_password) {
			$this->session->set_flashdata('message','edit_success');
			redirect('Change_password/index');
		} else {
			$this->session->set_flashdata('message','edit_failed');
			redirect('Change_password/index');
		}
	}
}
?>