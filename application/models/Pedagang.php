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
		$query = $this->db->query("select * from data_pedagang");
		return $query->result();
	}

	public function getStatusAkun($statusAkun){
		$this->load->database();
		$query = $this->db->query("select * from data_pedagang where statusAkun = ? ",[
			$statusAkun
		]);
		return $query->result();	
	}
	public function getPedagangById($idPedagang){
		$this->load->database();
		$query = $this->db->query("select distinct * from data_pedagang join menu_pedagang on data_pedagang.idPedagang = menu_pedagang.idPedagang where idUser = ?", [
			$idPedagang
		]);
		return $query->row_array();
	}

	public function getPengajuanPedagangById($idPedagang){
		$this->load->database();
		$query = $this->db->query("select * from data_pedagang where idUser = ? AND data_pedagang.statusAkun = 0", [
			$idPedagang
		]);
		return $query->row_array();
	}

	public function getMenuByIdPedagang($idPedagang){
		$this->load->database();
		$query = $this->db->query("select * from menu where idPedagang=?", [
			$idPedagang
		]);
		return $query->result_array();
	}

	public function getPelanggan(){
		$this->load->database();
		$query = $this->db->query("select * from user where role = 0");
		return $query->result();	
	}

	public function getStatusMenu($status){
		$this->load->database();
		$query = $this->db->query("
			select * from menu_pedagang where status = ? 
			", [$status]);
		return $query->result();
	}


	public function approveStatusPedagang($idPedagang){
		$data = array(
			'statusAkun' => 1

		);

		$this->db->where('idPedagang', $idPedagang);
		$this->db->update('pedagang', $data); 
	}

	public function insert($data){
		$idPedagang = $data['idPedagang'];
		// $fotoKtp = $data['fotoKtp'];
		$this->db->query("INSERT INTO pedagang
			(idPedagang) 
			VALUES
			('$idPedagang')"); 
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



	public function laporanPedagang($idPedagang){
		$this->load->database();
		$query = $this->db->query("
			select * from transaksi_pedagang where id_pedagang = ? 
			", [$idPedagang]);
		return $query->result();
	}
}
