<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class C_API_TRANSAKSI extends CI_Controller {
	//transaksi

	function pesanMenu(){
		if($this->input->method() != "post") return;
		header('Content-Type: application/json');
		$this->load->model('Transaksi');
		$this->load->library('auth');
		$this->load->model('User');

		$token = $this->input->get_request_header('Authorization', true);

		if($this->auth->isAuthUser($token)) {
			// $menu = $this->Menu->one($id);
			// header('Content-Type: application/json');
			// echo json_encode($menu);
			

			$data = [];
			
			log_message('error', "before"); 
			$req = json_decode( file_get_contents('php://input') );
			log_message('error', "after");
			$data['namaMenu'] = $req->namaMenu;
			$data['hargaMenu'] = $req->hargaMenu;
			$data['deskripsiMenu'] = $req->deskripsiMenu;
			$data['fotoMenu'] = $req->fotoMenu;

			$username = $this->auth->getUserByToken($token);

			$userdata = $this->user->getByUser($username);

			$data['idPedagang'] = $userdata->idUser;

			
			$this->db->trans_start();
			log_message('error', "before sql");
			$resdb = $this->menu->insert($data);
			log_message('error', "after sql");
			$idMenu = $this->db->insert_id();
			$this->db->trans_complete();

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

