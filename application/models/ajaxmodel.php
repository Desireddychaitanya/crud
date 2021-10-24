<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ajaxmodel extends CI_Model 
{

	public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
       
       
    }
		
		public function getusernames()
		{
			$this->db->select('name');
			$records = $this->db->get('users');
			$users = $records->result_array();
			return $users;
		}
		public function getuserdetails($postdata)
		{
				$response = array();
			

			if (isset($postdata['name'])) 
			{
				$this->db->select('*');
				$this->db->where('name',$postdata['name']);
				$records = $this->db->get('users');
				$response = $records->result_array();

				
			}
			
			return $response;
		}

	
}
