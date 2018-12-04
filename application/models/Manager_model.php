<?php
class Manager_model extends CI_Model {
	public function get_name($emp_id)
	{
		$this->db->select('name');
        $this->db->where('emp_id',$emp_id);
        $result = $this->db->get('id_data');
        if($result->num_rows() == 1) {
            return $result->row(0);
        } else {
            return false;
        }
        // return $this->db->get_where($this->id_data, ["emp_id" => $emp_id])->row();
	}

    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('id_data');
        $query = $this->db->get();
        return $query;
    }

    public function get_purchase_data()
    {
        $this->db->select('*');
        $this->db->from('purchase');
        $query = $this->db->get();
        return $query;
    }

    public function get_order_data()
    {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $query = $this->db->get();
        return $query;
    }
    public function get_transaction_data()
    {
        $this->db->select('*');
        $this->db->from('transaction');
        $query = $this->db->get();
        return $query;
    }
    public function get_stock_data()
    {
        $this->db->select('*');
        $this->db->from('stock');
        $query = $this->db->get();
        return $query;
    }
}
?>