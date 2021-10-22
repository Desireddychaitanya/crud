<?php
defined('BASEPATH') OR exit('No direct script access allowed');


use chriskacerguis\RestServer\RestController;

/**
 * 
 */
class Api extends RestController
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('user');

	}
	public function users_get()
	{
		$id = $this->get('id');
		if ($id == null) 
		{
			$users = $this->user->get();
			$this->response($users,200);
		}else {
			$user = $this->user->get($id);
		
              if ($user) {
              	$this->response($user,200);
              } else {
              	$this->response([
              		'status' => false,
              		'message' => 'No such user founc'], 404);

              }

		}
	}




	public function  users_post()
	{
		$data = $this->post();
		//print_r($data);
		$id = $this->user->insert($data);
		if (!$id) 
		{
			$this->response([
				'status' =>false,
				'message' => 'Something went wrong'
			],500);
		}else
		{
			$data['id'] = $id;
			$this->response([
				'status' =>true,
				'data' =>$data,
				'message' => 'user recorderde'],200);

		}
	}

	public function users_put()
	{
		$id = $this->get('id');
		$data = $this->put();
		$check = $this->user->get($id);
		if (!$check) 
		{

			$this->response([
				'status' =>false,
				'message' => 'no such user found'
			],404);
			
		}else{
			$updated = $this->user->update($data,$id);
			if ($updated) 
			{
				$this->response([
				'status' =>true,
				'message' => 'user info  updated'
			],200);
			} else {
				$this->response([
				'status' =>false,
				'message' => 'something went wrong'
			],500);

			}
		}

	}

	public function users_delete()
	{
		$id = $this->get('id');
		$check = $this->user->get($id);
		if (!$check) 
		{
			$this->response([
				'status' => false,
				'message' => 'no such user found'],404);

			# code...
		}else {
			$deleted = $this->user->delete($id);
			if ($deleted) {
				$this->response([
				'status' => true,
				'message' => 'user info deleted'],404);

			}else{
	           $this->response([
				'status' => false,
				'message' => 'something went wrong'],500);
			}
		}
	}
}