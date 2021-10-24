<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class notecontroller extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('notemodel');
		 $this->load->library('session');

	}

	
	public function index()
	{
		$this->load->view('note');
	}
	public function insertdata()
	{
       $this->form_validation->set_rules('textarea', 'textarea','required');
       if ($this->form_validation->run() == FALSE) 
            {

             $this->load->view('note');
            }
            if ($this->form_validation->run() == TRUE) 
            {
                //$data['t1'] = time();
            $note = trim($this->input->post('textarea'));
                        
             $data=array(
            'textarea'=>$note,
            
            );

           
          
            $this->notemodel->insert($data);

            }


	}
	public function see()
	{
		$this->load->view('editdetails');

	}
	public function editview($id)
	{
		$data['id'] = $id;
		$data['query']= $this->db->query("select * from notes where sn=".$id)->result_array();

		$this->load->view('note1',$data);
	}

	public function editcontroller()
	{

		// $query= $this->db->query("select * from notes where sn=".$id)->result_array();
		$note = trim($this->input->post('textarea'));
		// print_r($id);
		// print_r($note);
		// echo "controller";
		$id = ($this->input->post('idd'));
		// print_r($id);
		// echo "end";

		$this->notemodel->editmodel($id,$note);

	}
	public function deletecontroller($id)
	{
		// $query= $this->db->query("select * from notes where sn=".$id)->result_array();
		$this->notemodel->deletemodel($id);


	}
	public function viewcontroller($id)
	{
		$query= $this->db->query("select * from notes where sn=".$id)->result_array();		$data['id'] = $id;
		$data['query'] = $query;

		$this->load->view('iddata',$data);

	}
}
