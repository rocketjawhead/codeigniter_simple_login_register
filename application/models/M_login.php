<?php
class M_login extends CI_Model {

	function m_check_login($email,$password)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('email',$email);
		$this->db->where('password',md5($password));
		$query=$this->db->get();
		return $query->row(0);	
	}

	



}