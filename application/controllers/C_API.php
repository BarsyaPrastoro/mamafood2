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
		$this->load->model('user');
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
			$username = $this->auth->getUserByToken($token);
			$user = $this->user->getByUser($username);
			$cols = ['idMenu','namaMenu','hargaMenu','deskripsiMenu', 'namaPedagang','fotoMenu'];
			$filter =  [];
			if(intval($user->role) === 1){
				$filter =  [
					'idPedagang' => $user->idUser
				];
				$cols = ['*'];
			}
			$menu = $this->Menu->all($cols,$sortby, $sortdir, $filter);
			
			echo json_encode($menu);
		}else{
			echo json_encode([
				"status" => "NOK",
				"message" => "Invalid Token"        
			]);
		}
	}

	//API Menu detail untuk pembeli

	function oneMenu($id){
		if ($this->input->method() != "get") return;

		$this->load->model('Menu');


		$token = $this->input->get_request_header('Authorization', true);
		header('Content-Type: application/json');
		if($this->auth->isAuthUser($token)){
			$this->load->model('user');
			$username = $this->auth->getUserByToken($token);
			$user = $this->user->getByUser($username);
			$filter = [
				'idMenu' => $id
			];
			$cols = ['idMenu','namaMenu','hargaMenu','deskripsiMenu', 'namaPedagang','fotoMenu'];
			if(intval($user->role) === 1){
				$filter = [
					'idMenu' => $id,
					'idPedagang' => $user->idUser
				];
				$cols = ['*'];
			}
			$menu = $this->Menu->one($cols,$filter);
			if(!$menu){
				echo json_encode([
					"status" => "NOK"
				]);
			}else{
				echo json_encode($menu);	
			}
			
		}else{
			echo json_encode([
				"status" => "NOK",
				"message" => "Invalid Token"        
			]);
		}

	}

	//API MENU PEDAGANG 1 ID

	function menuPedagang($idPedagang){
		if ($this->input->method() != "get") return;

		$this->load->model('Menu');

		$token = $this->input->get_request_header('Authorization', true);
		header('Content-Type: application/json');
		if($this->auth->isAuthUser($token)){

			$menu = $this->Menu->allMenuPedagang($idPedagang);
			
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
			$data['namaMenu'] = $req->namaMenu;
			$data['hargaMenu'] = $req->hargaMenu;
			$data['deskripsiMenu'] = $req->deskripsiMenu;
			$data['fotoMenu'] = $req->fotoMenu;

			$username = $this->auth->getUserByToken($token);

			$userdata = $this->user->getByUser($username);

			$data['idPedagang'] = $userdata->idUser;

			//$this->db->trans_begin();


			$resdb = $this->menu->insert($data);
			$idMenu = $this->db->insert_id();
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

	function editUser($id){
		if($this->input->method() != "post") return;
		header('Content-Type: application/json');
		$this->load->model('user');
		$token = $this->input->get_request_header('Authorization', true);

		if($this->auth->isAuthUser($token)){

			$data = [];
			$req = json_decode( file_get_contents('php://input') );
			$username = $this->auth->getUserByToken($token);

			$userdata = $this->user->getByUser($username);

			$data['idUser'] = $userdata->idUser;
			$id = $data['idUser'];

			$data['nama'] = $req->nama;
			$data['password'] = $req->password;
			$data['emailUser'] = $req->email;
			$data['noTelpon'] = $req->noTelpon;
			$data['Alamat'] = $req->alamat;

			$res = $this->user->updatePemesan($id, $data);
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
