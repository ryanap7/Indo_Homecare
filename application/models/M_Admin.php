<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Admin extends CI_Model {

	public function get_data($id = NULL)
    {
		$this->db->from('auth');
		if ($id != NULL) {
			$this->db->where('id_auth', $id);
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
		$this->db->from('auth');
		$this->db->where('id_auth', $id);
		$query = $this->db->get();

		return $query;
	}
	public function find($id)
	{
		$result = $this->db->where('id_jasa', $id)
		->limit(1)
		->get('jasa_medis');
		if($result->num_rows() > 0 ){
			return $result->row();
		}else{
			return array();
		}
	}

}