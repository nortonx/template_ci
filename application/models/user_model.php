<?php

class User_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->database();	
	}
	
	function login()
	{
		$this->db->where('login', $this->input->post('username') );
		$this->db->where('senha', $this->input->post('password') );
		$query = $this->db->get('users');
		
		if( $query->num_rows() == 1 ) {
			return true;
		}
						
	}
		
}
	