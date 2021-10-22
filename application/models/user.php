<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Model {
		

		public $table = 'users';

		public function get($id = false)
		{
			if ($id == false) {
				$users = $this->db->get($this->table);
				return $users->result_array();

			}
			$data = $this->db->where('id', $id)->get($this->table);
			return $data ? $data->row_array() : false;
		}
		public function insert($data)
		{
			$insert = $this->db->insert($this->table,$data);
			return $insert ? $this->db->insert_id() : false;
		}
		public function update($data,$id)
		{
			$update = $this->db->update($this->table,$data,array('id' => $id));
			return $update ? true : false;

		}
		public function delete($id)
		{
			$delete = $this->db->where('id',$id)->delete($this->table);
			return $delete ? true : false;

		}


	
}
