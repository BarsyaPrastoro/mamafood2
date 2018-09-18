<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class C_API extends CI_Controller {
	
	function signUp(){
		if($this->input->method() != "post") return;

		$req = json_decode( file_get_contents('php://input') );

		$this->load->model('user');

		$query = $this->user->signUpPemesan((array)$req);

		if($query == true) {
			$outputData = (object)array(
				'status' => true,
				'msg' => 'Register Success',
				'redirect' => 'home'  
			);
		} 
	}

	// API Menu home

	function menu(){
		if ($this->input->method() != "get") return;

		$this->load->model('Menu');

		$token = $this->input->get_request_header('Authorization', true);
		if($this->auth->isAuthUser($token)){
			$sortby = $this->input->get('sortby',true);
			$sortdir = $this->input->get('sortdir',true);
			if (empty($sortby)) {
				$sortby = "namaMenu";
			}
			if (empty($sortdir)) {
				$sortdir = "asc";
			}
			$menu = $this->Menu->all($sortby, $sortdir);
			header('Content-Type: application/json');
			echo json_encode($menu);
		}
	}

	//API Menu sebiji

	function oneMenu($id){
		if ($this->input->method() != "get") return;

		$this->load->model('Menu');

		$token = $this->input->get_request_header('Authorization', true);

		if($this->auth->isAuthUser($token)){
			$menu = $this->Menu->one($id);
			header('Content-Type: application/json');
			echo json_encode($menu);
		}

	}

}
