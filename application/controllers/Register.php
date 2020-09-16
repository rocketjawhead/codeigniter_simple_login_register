<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_register');
	}

	public function index()
	{
		$this->load->view('Register');
	}

	public function register_user()
	{
		$email = $this->input->post("email");
		$password = $this->input->post("password");

		//check email apakah tersedia
		$check_email = $this->M_register->check_email_exist($email);
		if($check_email)
		{
			$this->session->set_flashdata('error_msg','Proses gagal email sudah terdaftar, Silahkan menggunakan email lain');
			redirect('Login');
			die();
		}

		$process_insert_db = $this->M_register->insert_user($email,$password);
		if($process_insert_db){
          $this->session->set_flashdata('success_msg','Berhasil register, silahkan login');
          redirect('Login');
        }else{
          $this->session->set_flashdata('error_msg','Gagal register');
          redirect('Login');
        }
	}
}
