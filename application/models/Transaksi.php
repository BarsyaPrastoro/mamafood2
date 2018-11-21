<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Model {
	public function all(){
		$this->load->database();
		$query = $this->db->query("select * from transaksi_pedagang_pembeli");
		return $query->result();
	}

	public function one($id){
		$query = $this->db->query("select * from transaksi where id_transaksi = $id");
		return $query->row();
	}

	function doTransaksi($data){
		//$noTransaksi = $data['noTransaksi'];
		$jenisPembayaran = $data['jenisPembayaran'];
		$jenisPengambilan = $data['jenisPengambilan'];
		//$buktiTransfer = $data['buktiTransfer'];
		//$totalHarga = $data['totalHarga'];
		//$jumlahPesanan = $data['jumlahPesanan'];
		$idPedagang = $data['idPedagang'];
		$idPemesan = $data['idPemesan'];
		$this->db->query("INSERT INTO transaksi
			(jenis_pembayaran, jenis_pengambilan, id_pemesan, id_pedagang) 
			VALUES
			('$jenisPembayaran','$jenisPengambilan','$idPemesan','$idPedagang')"); 
		return $this->db->insert_id();
	}

	function beliMenu($data){
		$idTransaksi = $data['idTransaksi'];
		$idPemesan = $data['idPemesan'];
		$idMenu = $data['idMenu'];
		$kuantitas = $data['kuantitas'];

		$this->db->query("INSERT INTO pesan_menu 
			(idTransaksi, idPemesan, idMenu, kuantitas)
			VALUES
			('$idTransaksi', '$idPemesan', '$idMenu', '$kuantitas')");
	}

	function updateTotalHarga($idTransaksi,$totalHarga){
		$this->db->query("update transaksi set total_harga = $totalHarga where id_transaksi = $idTransaksi");
	}

	function approveTransaction($idTransaksi){
		$this->db->query("update transaksi set status_approval = 1 where id_transaksi = $idTransaksi");
	}

	function payTransaction($idTransaksi){
		$this->db->query("update transaksi set status_pembayaran = 1 where id_transaksi = $idTransaksi");
	}

	function processTransaction($idTransaksi){
		$this->db->query("update transaksi set status_pesanan = 1 where id_transaksi = $idTransaksi");
	}

	function transactionEnd($idTransaksi){
		$this->db->query("update transaksi set status_pengambilan = 1 where id_transaksi = $idTransaksi");
	}

}
?>