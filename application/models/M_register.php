<?php
class M_register extends CI_Model {

	function check_email_exist($email)
	{
		$get_email = $this->db->query("SELECT id FROM user WHERE email = '$email' ")->row();
		return $get_email->id;
	}

	function insert_user($email,$password)
	{
		$data = array(
			'email' => $email,
			'password' => md5($password) 
		);
		$this->db->insert('user',$data);
		return TRUE;
	}

	



}