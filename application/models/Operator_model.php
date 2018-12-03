<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Operator_model extends CI_Model
{
    private $_table = "opgudang";

    public function get_data()
	{
		$this->db->select('*');
        $this->db->from('opgudang');

        $query = $this->db->get();
        return $query;
	}
    
    public function getById($idemployee)
    {
        return $this->db->get_where($this->opgudang, ["idemployee" => $id])->row();
    }

	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

  
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	
    

	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
}