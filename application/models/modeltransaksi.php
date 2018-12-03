<?php defined('BASEPATH') OR exit('No direct script access allowed');

class modeltransaksi extends CI_Model
{
    private $_table = "transaction";

    public function get_data()
	{
		$this->db->select('*');
        $this->db->from('transaction');

        $query = $this->db->get();
        return $query;
	}
    
    public function getById($idtransaction)
    {
        return $this->db->get_where($this->transaction, ["idtransaction" => $id])->row();
    }

	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

  
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	
    
}