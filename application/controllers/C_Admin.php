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

	public function dataPegawai(){
		$this->load->model('UserPerusahaan');
		$pegawai = $this->UserPerusahaan->getPegawai();
		$this->load->view('pedagang',['semuaPedagang' => $semuaPedagang]);
	}
	
}
