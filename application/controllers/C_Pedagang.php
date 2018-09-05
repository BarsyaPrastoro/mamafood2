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
	public function dataPengajuanPedagang()
	{
		$this->load->model('Pedagang');
		$semuaPedagang = $this->Pedagang->all();
		$this->load->view('pedagang',['semuaPedagang' => $semuaPedagang]);
		
	}

	public function reviewerPedagang(){
		$this->load->model('Pedagang');
		$dataPdg = $this->Pedagang->getStatusAkun(1);
		$this->load->view('divisi/applicantreviewer/apr-datapdg.php',[
			'dataPdg' => $dataPdg,
			'acc_indicator' => $this->acc_indicator,
			'sidebar' => $this->load->view('sidebar',[
				'nama_hal' => 'reviewer-pedagang'
			], true)
		]);
	}
	public function reviewerPelanggan(){
		$this->load->model('Pedagang');
		$dataPlg = $this->Pedagang->getPelanggan();
		$this->load->view('divisi/applicantreviewer/apr-dataplg.php',[
			'dataPlg' => $dataPlg,
			'acc_indicator' => $this->acc_indicator,
			'sidebar' => $this->load->view('sidebar',[
				'nama_hal' => 'reviewer-pelanggan'
			], true)
		]);
	}
	public function reviewerPengajuan(){
		$this->load->model('Pedagang');
		$dataPengajuan = $this->Pedagang->getStatusAkun(0);
		$this->load->view('divisi/applicantreviewer/apr-pengajuanpdg.php',[
			'dataPengajuan' => $dataPengajuan,
			'acc_indicator' => $this->acc_indicator,
			'sidebar' => $this->load->view('sidebar',[
				'nama_hal' => 'pengajuan-pedagang'
			], true)
		]);
	}
	public function reviewerMenu(){
		$this->load->model('Pedagang');
		$dataMenu = $this->Pedagang->getStatusMenu(0);
		$this->load->view('divisi/applicantreviewer/apr-konfirm.php',[
			'dataMenu' => $dataMenu,
			'acc_indicator' => $this->acc_indicator,
			'sidebar' => $this->load->view('sidebar',[
				'nama_hal' => 'konfirmasi-menu'
			], true)
		]);
	}
}
