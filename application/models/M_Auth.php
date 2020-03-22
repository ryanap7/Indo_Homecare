<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Auth extends CI_Model {
    
    public function check_admin($pin)
	{
		

		$this->db->select('*');
		$this->db->from('GYM_TBL_AUTH');
		$this->db->where('PIN', $pin);
		$query = $this->db->get();

		return $query;
	}
}
