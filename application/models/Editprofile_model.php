<?php
class EditProfile_model extends CI_Model
{
	public function get_data($userid)
	{
		$this->db->select('*');
		$this->db->from('id_data');
		$this->db->where('emp_id',$userid);
		$query = $this->db->get();
		return $query->result();
	}
	public function edit_profile($data,$imgsrc)
	{
		if ($imgsrc == "") {
			$param = array(
				"username" => $data['username'],
				"name" => $data['name'],
				"email" => $data['email'],
				"level" => $data['level']
			);
		} else {
			$param = array(
				"username" => $data['username'],
				"name" => $data['name'],
				"email" => $data['email'],
				"level" => $data['level'],
				"disp_pic" => $imgsrc
			);	
		}
		$this->db->where('emp_id',$this->session->userdata('emp_id'));
		$update = $this->db->update('id_data', $param);
		if ($update) {
			return true;
		} else {
			return false;
		}
	}
}
?>