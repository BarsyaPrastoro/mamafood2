<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Model {
	public function all(){
		$this->load->database();
		$query = $this->db->query("select * from transaksi");
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
			(no_transaksi, jenis_pembayaran, jenis_pengambilan, bukti_transfer, total_harga, jumlah_pesanan, id_pemesan, id_pedagang) 
			VALUES
			('$noTransaksi','$jenisPembayaran','$jenisPengambilan','$buktiTransfer','$totalHarga','$jumlahPesanan','$idPemesan','$idPedagang')"); 
	}

	function beliMenu($data){
		$idOrder = $data['idOrder'];
		$idPemesan = $data['idPemesan'];
		$idMenu = $data['idMenu'];
		$this->db->query("INSERT INTO pesan_menu 
			(idOrder, idPemesan, idMenu)
			VALUES
			('$idOrder', '$idPemesan', '$idMenu')");
	}

}
?>