<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Pedagang extends CI_Controller {
	public $acc_indicator;
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->acc_indicator = $this->load->view('acc-indicator',[
			'username' => $this->session->userdata('username'),
		], true);
	}
	
	public function transaksi(){
		$this->load->model('Pedagang');
		$semuaPedagang = $this->Pedagang->all();
		$this->load->view('divisi/profitablemeasure/pm-laporankeuangan.php',[
			'semuaPegawai' => $semuaPegawai,
			'acc_indicator' => $this->acc_indicator,
			'topbar' => $this->load->view('topbar',[],true),
			'sidebarPM' => $this->load->view('sidebarPM',[
				'nama_hal' => 'pm-laporankeuangan'

			], true)
		]);
	}

}
