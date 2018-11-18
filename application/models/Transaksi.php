<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Model {
	public function all(){
		$this->load->database();
		$query = $this->db->query("select * from transaksi_pedagang_pembeli");
		return $query->result();

	}

	function doTransaksi($data){
		$noTransaksi = $data['noTransaksi'];
		$jenisPembayaran = $data['jenisPembayaran'];
		$jenisPengambilan = $data['jenisPengambilan'];
		$buktiTransfer = $data['buktiTransfer'];
		$totalHarga = $data['totalHarga'];
		$jumlahPesanan = $data['jumlahPesanan'];
		$idPedagang = $data['idPedagang'];
		$idPemesan = $data['idPemesan'];
		$this->db->query("INSERT INTO transaksi
			(jenis_pembayaran, jenis_pengambilan, total_harga, id_pemesan, id_pedagang) 
			VALUES
			('$jenisPembayaran','$jenisPengambilan','$totalHarga','$idPemesan','$idPedagang')"); 
		return this->db->insert_id();
	}

	function beliMenu($data){
		$idOrder = $data['idOrder'];
		$idPemesan = $data['idPemesan'];
		$idMenu = $data['idMenu'];
		$kuantitas = $data['kuantitas'];

		$this->db->query("INSERT INTO pesan_menu 
			(idOrder, idPemesan, idMenu, kuantitas)
			VALUES
			('$idOrder', '$idPemesan', '$idMenu', '$kuantitas')");
	}

}
?>