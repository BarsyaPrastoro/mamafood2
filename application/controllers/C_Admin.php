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
		$this->auth->doAuth();
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

	public function detailPegawai($idPegawai){
		$this->auth->doAuth();
		$this->load->model('UserPerusahaan');
		$dataPegawai = $this->UserPerusahaan->getPegawaiById($idPegawai);
		$dataPegawai['idUser'] = ("ID NUMBER");
		$this->load->view('divisi/admin/detail/detail-pegawai.php',[
			'dataPegawai' => $dataPegawai,
			'acc_indicator' => $this->acc_indicator,
			'nama_hal' => 'adm-pegawai',
			'topbar' => $this->load->view('topbar',[],true)
		]);

	}

	

	public function dataUser(){
		$this->auth->doAuth();
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

	public function detailUser($idUser){
		$this->load->model('User');
		$dataUser = $this->User->getUserById($idUser);
		//$dataUser['idUser'] = ("ID NUMBER");
		$this->load->view('divisi/admin/detail/detail-user.php',[
			'dataUser' => $dataUser,
			'acc_indicator' => $this->acc_indicator,
			'nama_hal' => 'adm-user',
			'topbar' => $this->load->view('topbar',[],true)
		]);

	}
	
	function insertPegawai(){
		$this->auth->doAuth();
		$this->load->model('UserPerusahaan');
		//$this->load->view 	('divisi/admin/adm-pegawai.php');
		$this->UserPerusahaan->insertPegawai();
		redirect('/admin/pegawai', 'refresh');
	}
}
