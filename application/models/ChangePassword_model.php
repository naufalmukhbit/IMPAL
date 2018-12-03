<?php
class ChangePassword_model extends CI_Model
{
	public function edit($old,$new)
	{
		$this->db->where('password',$old);
		$query = $this->db->update('password',$new);
		if($query) {
			return true;
		} else {
			return false;
		}
	}
}
?>