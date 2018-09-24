<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {
	public function isExist($username, $password){
		$this->load->database();
		$query = $this->db->query("select * from user where namaUser=? and password=? ",[
			$username,
			$password
		]);

		return $query->result();
	}

	//insert User / SIGNUP PEMESAN

	public function signUpPemesan($data){
		$this->load->database();
		$nama = $data['nama'];
		$email = $data['email'];
		$password = $data['password'];
		$telepon = $data['noTelpon'];
		$alamat = $data['Alamat'];
		$this->db->query("INSERT INTO user(role, namaUser,emailUser, password, noTelpon, Alamat) VALUES(0,'$nama','$email','$password','$telepon','$alamat')");

	}

	//EDIT USER
	function getPemesanById($data){
		$this->load->database();
		$nama = $data['nama'];
		$email = $data['email'];
		$password = $data['password'];
		$telepon = $data['noTelpon'];
		$alamat = $data['Alamat'];
		$this->db->query("INSERT INTO user(role, namaUser,emailUser, password, noTelpon, Alamat) VALUES(0,'$nama','$email','$password','$telepon','$alamat')");
	}

	function updatePemesan($id, $data ){

	}


	public function getByUser($username){
		$query = $this->db->query("select * from user where namaUser=?",[
			$username
		]);
		$row = $query->result();
		if(count($row) < 1){
			return false;
		}else{
			return $row[0];
		}
	}

	public function getUserById($idUser){
		$this->load->database();
		$query = $this->db->query("select * from user where idUser = ?", [$idUser]);
		return $query->row_array();
	}
}
