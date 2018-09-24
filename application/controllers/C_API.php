<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class C_API extends CI_Controller {
	//SIGNUP PEMESAN
	function signUp(){
		if($this->input->method() != "post") return;
		$data = json_decode( file_get_contents('php://input') );


		$this->load->model('user');

		$query = $this->user->signUpPemesan((array)$data);

		if($query == true) {
			$outputData = (object)array(
				'status' => true,
				'msg' => 'Register Success',
				'redirect' => 'home'  
			);
		} 
	}
	function update_student_id1() {
		$id= $this->input->post('did');
		$data = array(
		'Student_Name' => $this->input->post('dname'),
		'Student_Email' => $this->input->post('demail'),
		'Student_Mobile' => $this->input->post('dmobile'),
		'Student_Address' => $this->input->post('daddress')
		);
		$this->update_model->update_student_id1($id,$data);
		$this->show_student_id();
	}

	//SIGNUP PEDAGANG

	function signUpPedagang(){
		if($this->input->method() != "post") return;

		$req = json_decode( file_get_contents('php://input') );

		$this->load->model('pedagang');

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
			$req = json_decode( file_get_contents('php://input') );
			$fd = fopen("public/images/fotomenu/test.jpg","wb");
			fwrite($fd,base64_decode($req->fotoMenu));
			fclose($fd);

			$data['namaMenu'] = $req->namaMenu;
			$data['hargaMenu'] = $req->hargaMenu;
			$data['deskripsiMenu'] = $req->deskripsiMenu;

			$username = $this->auth->getUserByToken($token);

			$userdata = $this->user->getByUser($username);

			$data['idPedagang'] = $userdata->idUser;

			//$this->db->trans_begin();


			$resdb = $this->menu->insert($data);
			$idMenu = $this->db->insert_id();
			$fd = fopen("public/images/fotomenu/$idMenu.jpg","wb");
			fwrite($fd,base64_decode($req->fotoMenu));
			fclose($fd);
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
