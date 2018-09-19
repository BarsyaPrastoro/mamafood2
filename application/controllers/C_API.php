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

	// API Menu home pembeli

	function menu(){
		if ($this->input->method() === "post") return $this->insertMenu();
		if ($this->input->method() != "get") return;
		header('Content-Type: application/json');
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
			
			echo json_encode($menu);
		}else{
			echo json_encode([
				"status" => "NOK",
				"message" => "Invalid Token"        
			]);
		}
	}

	//API Menu sebiji

	function oneMenu($id){
		if ($this->input->method() != "get") return;

		$this->load->model('Menu');

		$token = $this->input->get_request_header('Authorization', true);
		header('Content-Type: application/json');
		if($this->auth->isAuthUser($token)){
			$menu = $this->Menu->one($id);
			
			echo json_encode($menu);
		}else{
			echo json_encode([
				"status" => "NOK",
				"message" => "Invalid Token"        
			]);
		}

	}

	function insertMenu(){

		if($this->input->method() != "post") return;
		header('Content-Type: application/json');
		$this->load->model('menu');
		$this->load->library('auth');
		$this->load->model('user');

		$token = $this->input->get_request_header('Authorization', true);

		if($this->auth->isAuthUser($token)){
			// $menu = $this->Menu->one($id);
			// header('Content-Type: application/json');
			// echo json_encode($menu);
			

			$data = [];

			$data['namaMenu'] = $this->input->post('namaMenu');
			$data['hargaMenu'] = $this->input->post('hargaMenu');
			$data['deskripsiMenu'] = $this->input->post('deskripsiMenu');
			

			$username = $this->auth->getUserByToken($token);

			$userdata = $this->user->getByUser($username);

			$data['idPedagang'] = $userdata->idUser;

			//$this->db->trans_begin();

			$resdb = $this->menu->insert($data);

			$config['upload_path']          = './public/images/fotomenu/';
			$config['allowed_types']        = 'jpg';
			$config['max_size']             = 2000;
			$config['file_name']             = $this->db->insert_id()."";

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('fotoMenu')) {
				//$this->db->trans_rollback();
				echo json_encode([
					"status" => "NOK",
					"message" => "Upload failed!"
				]);
				return;
			}

			//$this->db->trans_commit();

			echo json_encode([
				"status" => "OK"        
			]);
		}
		else{
			echo json_encode([
				"status" => "NOK",
				"message" => "Invalid Token"        
			]);
		}
	}

}
