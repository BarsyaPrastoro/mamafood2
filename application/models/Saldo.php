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

	//buat ngurangin saldo

	public function pay($idUser, $value){
		$query = $this->db->query("select jumlah from saldo where idSaldo = $idUser");
		$saldo = $query->row()->jumlah;
		$saldoAkhir = $saldo - $value;
		if(intval($saldo) < intval($value)) return false;
		$this->db->query("update saldo set jumlah = $saldoAkhir where idSaldo = $idUser");
		return true;
	}

	public function receive($idUser, $value){
		$query = $this->db->query("select jumlah from saldo where idSaldo = $idUser");
		$saldo = $query->row()->jumlah;
		$saldoAkhir = $saldo + $value;
		$this->db->query("update saldo set jumlah = $saldoAkhir where idSaldo = $idUser");
		return true;
	}

	public function insert($idSaldo){
		$res = $this->db->query("INSERT INTO saldo (idSaldo) VALUES ($idSaldo)");
		return $res;
	}

	public function top_up($data){
		$jumlah = $data['jumlah_topup'];
		$id = $data['id_user'];
		$bukti_transfer = $data['bukti_transfer'];
		$this->db->query("INSERT INTO topup_saldo 
			(jumlah_topup, id_user, bukti_transfer)
			VALUES
			('$jumlah', '$id', '$bukti_transfer')");
	}

	
}
?>