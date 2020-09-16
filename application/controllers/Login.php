<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
	}

	public function index()
	{
		$this->load->view('Login');
	}

	public function check_login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		//process login
		$check_login = $this->M_login->m_check_login($email,$password);
		
		if($check_login != NULL)
		{
			//simpan session login
			$data_save = array(
				'id' => $check_login->id,
				'email' => $check_login->email,
				'is_logged_in' => TRUE
			);
			$this->session->set_userdata($data_save);
			redirect('Dashboard');	
		}else{
			$this->session->set_flashdata('error_msg','Akun tidak ditemukan, Silahkan login kembali');
			redirect('Login');
		}
		//end process login
	}

	public function user_logout()
    {
		$array_items = array(
		'id', 
		'email',
		'is_logged_in',
		);

        $this->session->unset_userdata($array_items);
        $this->session->set_flashdata('msg', 'Admin Signed Out Now!');
        redirect('Login');
    }
}
