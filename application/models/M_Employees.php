<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Employees extends CI_Model {

	public function get_data($id = NULL)
    {
		$this->db->from('employees');
		if ($id != NULL) {
			$this->db->where('id_employee', $id);
		}
		$query = $this->db->get();
		return $query;
    }

  	// ------------------------------------------------------------------------
  	public function store($data,$table)
    {
		$this->db->insert($table,$data);
	}
	
	public function update($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
	}
	// ------------------------------------------------------------------------
	    
	public function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function check_img($id)
	{
		$this->db->select('*');
		$this->db->from('employees');
		$this->db->where('id_employee', $id);
		$query = $this->db->get();

		return $query;
	}

	public function generate($prefix =  null, $table = null, $field = null)
    {
        $this->db->select('nip');
        $this->db->like($field, $prefix, 'after');
        $this->db->order_by($field, 'desc');
        $this->db->limit(1);

        return $this->db->get($table)->row_array()[$field];
    }

}