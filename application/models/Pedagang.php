<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedagang extends CI_Model {
	public $idPedagang;
	public $umurAkun;
	public $fotoProfil;
	public $fotoKTP;
	public $statusAkun;
	public $waktuSignUp;
	public $jumlahMenu;

	public function all(){
		$this->load->database();
		$query = $this->db->query("select * from pedagang");
		return $query->result();
	}

	public function getStatusAkun($statusAkun){
		$this->load->database();
		$query = $this->db->query("select * from data_pedagang where statusAkun = ? ",[
			$statusAkun
		]);
		return $query->result();	
	}

	public function getPelanggan(){
		$this->load->database();
		$query = $this->db->query("select * from data_pemesan");
		return $query->result();	
	}

	public function getStatusMenu($status){
		$this->load->database();
		$query = $this->db->query("
				select * from menu_pedagang where status = ? 
			", [$status]);
		return $query->result();
	}
	/*public function filter($args){
		$sql = "select * from user ";
		$filter_stat = false;
		$where = "where ";
		if(isset($args['role'])){
			$filter_stat = true;
			$role = $args['role'];
			$where .= "role = $role";
		}

		if($filter_stat) $sql .= $where;
		$this->load->database();
		$query = $this->db->query($sql);
		return $query->result();
	}*/
}
