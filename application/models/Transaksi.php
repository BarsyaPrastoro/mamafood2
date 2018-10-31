<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan extends CI_Model {
	public function all(){
		$this->load->database();
		$query = $this->db->query("select * from transaksi");
		return $query->result();

	}

}
?>