<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Admin extends CI_Controller {
	public $acc_indicator;

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->acc_indicator = $this->load->view('acc-indicator',[
			'username' => $this->session->userdata('username'),
		], true);
	}

	public function pesanMasuk(){
		//$this->load->model('UserPerusahaan');
		//$semuaPegawai = $this->UserPerusahaan->getPegawai();
		$this->load->view('divisi/customerservice/cs-pesanmsk.php',[
			//'semuaPegawai' => $semuaPegawai,
			'acc_indicator' => $this->acc_indicator,
			'sidebarAdmin' => $this->load->view('sidebarAdmin',[
				'nama_hal' => 'adm-pegawai'
			], true)
		]);
	}
	
}
