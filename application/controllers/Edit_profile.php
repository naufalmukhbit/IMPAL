<?php
class Edit_profile extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('EditProfile_model');
	}

	public function index()
	{
		$data = array(
			'title' => 'Edit Your Profile',
			'filename' => 'edit_profile',
			'profile' => $this->EditProfile_model->get_data($this->session->userdata('emp_id'))
		);
		$this->load->view('edit_profile',$data);
	}

	public function edit_profile()
	{
		if (empty($_FILES['display-picture']['name'])) {
			$data = $this->input->post(null,TRUE);
			$file_name = "";
			$add_profile = $this->EditProfile_model->edit_profile($data,$file_name);
			if($add_profile) {
				$this->session->set_flashdata('message','update_success');
				redirect('Edit_profile/index');
			} else {
				$this->session->set_flashdata('message','update_error');
				redirect('Edit_profile/index');
			}
		} else {
			$config['upload_path']          = './docs/display-pictures/';
			$config['allowed_types']        = 'jpg|png';
			$config['max_size']             = 2048;
			$config['max_width']            = 0;
	        $config['max_height']           = 0;
			$this->load->library('upload', $config);
			
			if($this->upload->do_upload('display-picture')) {
				$upload_data = $this->upload->data(); 
				$file_name = $upload_data['file_name'];

				$data = $this->input->post(null,TRUE);
				$add_profile = $this->EditProfile_model->edit_profile($data,$file_name);
				$this->session->set_flashdata('message','update_success');
				$this->session->set_userdata('userpic',$file_name);
				redirect('Edit_profile/index');
			} else {
				$this->session->set_flashdata('message','update_error');
				redirect('Edit_profile/index');
			}	
		}
	}

	public function delete_user()
    {
        $emp_id = $this->input->post('emp_id');
        $hapus = $this->Users_model->delete_user($emp_id);
        redirect('Home/logout');
    }
}
?>