<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserPerusahaan extends CI_Model {

	public function isExist($username, $password){
		$this->load->database();
		$query = $this->db->query("select * from userperusahaan where namaPegawai=? and password = ? ",[
			$username,
			$password,
		]);

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
