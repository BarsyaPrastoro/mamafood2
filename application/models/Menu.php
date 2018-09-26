<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Model {
	public $idMenu;
	public $idPedagang;
	public $namaMenu;
	public $hargaMenu;
	public $deskripsiMenu;
	public $fotoMenu;
	public $status;
	public $namaPedagang;

	public function all($sortby, $sortdir){
		$this->load->database();
		// $query = $this->db->query("select * from menu_pedagang ORDER BY ? ?", [
		// 	$sortby,
		// 	$sortdir
		// ]);
		$query = $this->db->query("select * from menu_pedagang ORDER BY $sortby $sortdir");
		return $query->result();
	
	}	

	public function one($id){
	
		$query = $this->db->query("select * from menu_pedagang where idMenu = ?" , [
			$id
		]);
		$res = $query->result();

		if (count($res) > 0) {
			return $res[0];
		}else{
			return false;
		}		
	}

	public function getMenuById($idMenu){
		$this->load->database();
		$query = $this->db->query("select * from menu where idMenu = ?", [
			$idMenu
		]);
		return $query->row_array();
	}

	public function insert($data){
		$idPedagang = $data['idPedagang'];
		$namaMenu = $data['namaMenu'];
		$hargaMenu = $data['hargaMenu'];
		$deskripsiMenu = $data['deskripsiMenu'];
		$this->db->query("INSERT INTO menu(idPedagang, namaMenu, hargaMenu, deskripsiMenu) VALUES('$idPedagang','$namaMenu','$hargaMenu','$deskripsiMenu')");

	}

	public function approveMenu($idMenu){
		$data = array(
			'status' => 1

		);

		$this->db->where('idMenu', $idMenu);
		$this->db->update('menu', $data); 
	}
}
