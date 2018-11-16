<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Saldo extends CI_Model {
	public function all(){
		$this->load->database();
		// $query = $this->db->query("select * from menu_pedagang ORDER BY ? ?", [
		// 	$sortby,
		// 	$sortdir
		// ]);
		$query = $this->db->query("select * from saldo_user");
		return $query->result();
	
	}

	public function saldoUser($idUser){
		$this->load->database();
		$query = $this->db->query("select jumlah from saldo_user where idUser = ?", [
			$idUser
		]);
		return $query->row_array();
	}

	public function insert($data){
		$id = $data['idPedagang'];
		$namaMenu = $data['namaMenu'];
		$hargaMenu = $data['hargaMenu'];
		$deskripsiMenu = $data['deskripsiMenu'];
		$fotoMenu = $data['fotoMenu'];
		$this->db->query("INSERT INTO menu
			(idPedagang, namaMenu, hargaMenu, deskripsiMenu, fotoMenu) 
			VALUES
			('$idPedagang','$namaMenu','$hargaMenu','$deskripsiMenu','$fotoMenu')"); 
	}
}
?>