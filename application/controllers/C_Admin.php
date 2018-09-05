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
		$semuaPegawai = $this->UserPerusahaan->getPegawai();
		$this->load->view('divisi/admin/adm-pegawai.php',[
			'semuaPegawai' => $semuaPegawai,
			'acc_indicator' => $this->acc_indicator,
			'topbar' => $this->load->view('topbar',[],true),
			'sidebarAdmin' => $this->load->view('sidebarAdmin',[
				'nama_hal' => 'adm-pegawai'

			], true)
		]);
	}

	public function dataUser(){
		$this->load->model('UserPerusahaan');
		$semuaUser = $this->UserPerusahaan->getUser();
		$this->load->view('divisi/admin/adm-user.php',[
			'semuaUser' => $semuaUser,
			'acc_indicator' => $this->acc_indicator,
			'topbar' => $this->load->view('topbar',[],true),
			'sidebarAdmin' => $this->load->view('sidebarAdmin',[
				'nama_hal' => 'adm-user'
			], true)
		]);
	}
	
}
