<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {
	public function isExist($username, $password){
		$this->load->database();
		$query = $this->db->query("select * from user where namaUser=? and password=? and role = 0 ",[
			$username,
			$password
		]);

		return $query->result();
	}

	public function getByUser($username){
		$query = $this->db->query("select * from user where namaUser=? and role = 0 ",[
			$username
		]);
		$row = $query->result();
		if(count($row) < 1){
			return false;
		}else{
			return $row[0];
		}
	}
}
