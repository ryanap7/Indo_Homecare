<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Calendar extends CI_Model {

    public function get_data()
	{
        $this->db->from('employees');
		$query = $this->db->get();
		return $query;
	}
}