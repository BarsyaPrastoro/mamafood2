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

	public function alltopup(){
		$this->load->database();
		$query = $this->db->query("select * from topup_saldo join user on topup_saldo.id_user = user.idUser where status_approval = 0");
		return $query->result();
	}

	public function approveTopup($idTopup){
		$this->load->database();
		$this->db->query("UPDATE `topup_saldo` SET `status_approval` = 1 WHERE `id_topup` = $idTopup");
	}

	public function getJumlah($idTopup){
		$this->load->database();
		$query = $this->db->query("select jumlah_topup from topup_saldo where id_topup = $idTopup");
		$jumlah = $query->result_array();
		return (int) $jumlah[0]['jumlah_topup'];
	}


	public function topup($id){
		$this->load->database();
		$nambah = $this->db->query("SELECT * FROM topup_saldo where id_topup = '$id' ");
		$jumlahTopup = $nambah->row()->jumlah_topup;
		$idUser = $nambah->row()->id_user;
		$query = $this->db->query("select jumlah from saldo where idSaldo = $idUser");

		$saldo = $query->row()->jumlah; 
		$saldoAkhir = $saldo + $jumlahTopup;
		$this->db->query("UPDATE `saldo` SET `jumlah` = $saldoAkhir WHERE `idSaldo` = $idUser");

	}

	//keuntungan dari jualan masakan
	public function insert($jumlah, $kategori){
		$this->load->database();
		$this->db->query("INSERT INTO keuntungan 
			(jumlah, kategori)
			VALUES
			('$jumlah', '$kategori') ");
	}

	public function total($kategori){
		$this->load->database();
		$query = $this->db->query( "SELECT sum(jumlah) as total from keuntungan where kategori = '$kategori' " );
		$total = $query->result_array();
		return (int) $total[0]['total'];
	}

}
?>