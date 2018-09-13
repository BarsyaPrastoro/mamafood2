<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserPerusahaan extends CI_Model {

	public function isExist($username, $password){
		$this->load->database();
		$query = $this->db->query("select * from userperusahaan where namaPegawai=? and password = ? ",[
			$username,
			$password
		]);

		return $query->result();
	}

	public function insertPegawai(){
		$status = $_POST['status'];
		$nama = $_POST['name'];
		$password = $_POST['password'];
		$telepon = $_POST['telepon'];
		$alamat = $_POST['alamat'];
		$this->db->query("INSERT INTO userperusahaan VALUES('','$status','$nama','$password','$telepon','$alamat')");

	}

	public function getPegawai(){
		$this->load->database();
		$query = $this->db->query("select * from userperusahaan");
		return $query->result();
	}
	public function getPegawaiById($idPegawai){
		$this->load->database();
		$query = $this->db->query("select * from userperusahaan where idUser = ?", [$idPegawai]);
		return $query->row_array();
	}

	public function getUser(){
		$this->load->database();
		$query = $this->db->query("select * from user");
		return $query->result();
	}

	// public function getStatus($username, $password,$status){
	// 	$this->load->database();
	// 	$query = $this->db->query("select * from userperusahaan where namaPegawai=? and password = ? and status = ?",[
	// 		$username,
	// 		$password,
	// 		$status
	// 	]);
	// 	return count($query->result()) == 1;
	// }
}
