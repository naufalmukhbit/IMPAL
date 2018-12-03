<?php
class Register_model extends CI_Model {
	public function add_data($data)
	{
        $param = array(
        	"emp_id" => $data['emp_id'],
        	"username" => $data['username'],
        	"name" => $data['name'],
			"email" => $data['email'],
			"password" => $data['password'],
			"level" => $data['position']
		);
		$this->db->where('username',$param['username']);
		$check = $this->db->get('id_data');
		if($check->num_rows()==1) {
			return false;
		} else {
			$this->db->where('emp_id',$param['emp_id']);
			$check2 = $this->db->get('id_data');
			if ($check2->num_rows()==1) {
				return false;
			} else {
				$insert = $this->db->insert('id_data', $param);
				if ($insert) {
					return true;
				} else {
					return false;
				}
			}
		}
    }

}
?>