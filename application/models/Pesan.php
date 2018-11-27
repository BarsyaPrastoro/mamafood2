<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan extends CI_Model {
	public function all(){
		$this->load->database();
		// $query = $this->db->query("select * from menu_pedagang ORDER BY ? ?", [
		// 	$sortby,
		// 	$sortdir
		// ]);
		$query = $this->db->query("select * from pesan_masuk");
		return $query->result();
	
	}

	public function detail($idPesan){
		$this->load->database();
		$query = $this->db->query("select * from pesan_masuk where idPesan = ?", [
			$idPesan
		]);
		return $query->row_array();
	}

	public function insert($data){
		$this->load->database();
		$isi = $data['isi'];
		$idUser = $data['idUser'];
		$this->db->query("INSERT INTO pesan 
			(idUser, isi)
			VALUES
			('$idUser', '$isi')");
	}
}
?>