<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class notemodel extends CI_Model 
{

	public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
       
       
    }
		
public function insert($data)
{
 $this->db->insert('notes', $data);
 echo "inserted data";
}


public function  editmodel($id,$note)
{
	$data = array(
		'textarea' => $note
	);
	$this->db->where('sn',$id);
	$this->db->update('notes',$data);
		echo "updated sucessfuly";

}
public function deletemodel()
{

}

	
}
