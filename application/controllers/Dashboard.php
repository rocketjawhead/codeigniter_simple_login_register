<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
	    $this->load->helper(array('url'));
	    if($this->session->userdata('is_logged_in') =='')
	    {
	     $this->session->set_flashdata('msg','Please Login to Continue');
	     redirect('Login');
	    }
	}

	public function index()
	{
		$this->load->view('Dashboard');
	}




}
