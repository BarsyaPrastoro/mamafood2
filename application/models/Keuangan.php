<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keuangan extends CI_Model {
	public function all(){
		$this->load->database();
		$query = $this->db->query("select * from keuntungan");
		return $query->result();
	}

	public function gantiPersentase($data){
		$this->load->database();
		$this->db->query("UPDATE `settings` SET `persentase` = $data WHERE `id_settings` = 1");
		
	}

	public function persentase(){
		$this->load->database();
		$query = $this->db->query("select persentase from settings");
		$persentase = $query->result_array();
		return (int) $persentase[0]['persentase'];
	}


}
?>