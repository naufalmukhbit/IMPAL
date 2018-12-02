<?php
class Register_model extends CI_Model {
	public function add_data($data)
	{
        $param = array(
			"username" => $data['username'],
			"email" => $data['email'],
			"password" => $data['password']
		);
		$this->db->where('username',$param['username']);
		$check = $this->db->get('id_data');
		if($check->num_rows()==1) {
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
?>