<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ajaxcontroller extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('ajaxmodel');
		 $this->load->library('session');

	}
	public function index()
	{
		$users = $this->ajaxmodel->getusernames();
		$data['users'] = $users;
		$this->load->view('ajaxview', $data);

	}

	public function userdetails()
	{
		$postdata = $this->input->post();
		
		$data = $this->ajaxmodel->getuserdetails($postdata);
		//print_r($data);
		
		
		echo json_encode($data[0]);
		

	}


	
}
