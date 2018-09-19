<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Pedagang extends CI_Controller {
	public $acc_indicator;
	public function __construct(){
		parent::__construct();
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
	//PEDAGANG
	public function reviewerPedagang(){
		$this->auth->doAuth();
		$this->load->model('Pedagang');
		$dataPdg = $this->Pedagang->getStatusAkun(1);
		$this->load->view('divisi/applicantreviewer/apr-datapdg.php',[
			'dataPdg' => $dataPdg,
			'acc_indicator' => $this->acc_indicator,
			'topbar' => $this->load->view('topbar',[],true),
			'sidebar' => $this->load->view('sidebar',[
				'nama_hal' => 'reviewer-pedagang'
			], true)
		]);
	}

	//DETAIL PEDAGANG
	public function detailPedagang($idPedagang){
		$this->auth->doAuth();
		$this->load->model('Pedagang');
		$dataPedagang = $this->Pedagang->getPedagangById($idPedagang);
		$dataPedagang['idPedagang'] = ("ID NUMBER");
		$dataMenuPedagang = $this->Pedagang->getMenuByIdPedagang($idPedagang);
		$dataMenuPedagang['idPedagang'] = ("ID NUMBER");
		
		// header('Content-Type: application/json');
		// echo json_encode(var_dump($dataPedagang));
		// die();
		$this->load->view('divisi/applicantreviewer/detail/detail-datapdg.php',[
			'dataPedagang' => $dataPedagang,
			'dataMenuPedagang' => $dataMenuPedagang,
			'acc_indicator' => $this->acc_indicator,
			'nama_hal' => 'reviewer-pedagang',
			'topbar' => $this->load->view('topbar',[],true),
			'sidebar' => $this->load->view('sidebar',[
				'nama_hal' => 'reviewer-pedagang'
			], true)
		]);

	}



	public function reviewerPelanggan(){
		$this->auth->doAuth();
		$this->load->model('Pedagang');
		$dataPlg = $this->Pedagang->getPelanggan();
		$this->load->view('divisi/applicantreviewer/apr-dataplg.php',[
			'dataPlg' => $dataPlg,
			'acc_indicator' => $this->acc_indicator,
			'topbar' => $this->load->view('topbar',[],true),
			'sidebar' => $this->load->view('sidebar',[
				'nama_hal' => 'reviewer-pelanggan'
			], true)
		]);
	}
	public function reviewerPengajuan(){
		$this->auth->doAuth();
		$this->load->model('Pedagang');
		$dataPengajuan = $this->Pedagang->getStatusAkun(0);
		$this->load->view('divisi/applicantreviewer/apr-pengajuanpdg.php',[
			'dataPengajuan' => $dataPengajuan,
			'acc_indicator' => $this->acc_indicator,
			'topbar' => $this->load->view('topbar',[],true),
			'sidebar' => $this->load->view('sidebar',[
				'nama_hal' => 'pengajuan-pedagang'
			], true)
		]);
	}
	public function reviewerMenu(){
		$this->auth->doAuth();
		$this->load->model('Pedagang');
		$dataMenu = $this->Pedagang->getStatusMenu(0);
		$this->load->view('divisi/applicantreviewer/apr-konfirm.php',[
			'dataMenu' => $dataMenu,
			'acc_indicator' => $this->acc_indicator,
			'topbar' => $this->load->view('topbar',[],true),
			'sidebar' => $this->load->view('sidebar',[
				'nama_hal' => 'konfirmasi-menu'
			], true)
		]);
	}
}
