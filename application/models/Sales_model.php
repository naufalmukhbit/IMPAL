<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_model extends CI_Model
{
    private $_table = "sales";

    public function get_data()
	{
		$this->db->select('*');
        $this->db->from('sales');

        $query = $this->db->get();
        return $query;
	}
    
    public function getById($idemployee)
    {
        return $this->db->get_where($this->sales, ["idemployee" => $id])->row();
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