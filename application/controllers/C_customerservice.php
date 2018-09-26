<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_customerservice extends CI_Controller {
	public $acc_indicator;

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->acc_indicator = $this->load->view('acc-indicator',[
			'username' => $this->session->userdata('username'),
		], true);
	}

	public function pesanMasuk(){
		$this->auth->doAuth();
		$this->load->model('Pesan');
		$mail = $this->Pesan->all();
		$this->load->view('divisi/customerservice/cs-pesanmsk.php',[
			'mail' => $mail,
			'acc_indicator' => $this->acc_indicator,
			'topbar' => $this->load->view('topbar',[],true),
			'sidebarCS' => $this->load->view('sidebarCS',[
				'nama_hal' => 'pesan-msk'
			], true)
		]);
	}

	public function detailPesan($idPesan){
		$this->auth->doAuth();
		$this->load->model('Pesan');
		$detailMail = $this->Pesan->detail($idPesan);
		$this->load->view('divisi/customerservice/detail/detail-modalpesan.php',[
			'detailMail' => $detailMail,
			'acc_indicator' => $this->acc_indicator,
			'topbar' => $this->load->view('topbar',[],true),
			'sidebarCS' => $this->load->view('sidebarCS',[
				'nama_hal' => 'pesan-msk'
			], true)
		]);
	}
	
	public function pesanTerkirim(){
		$this->auth->doAuth();
		//$this->load->model('UserPerusahaan');
		//$semuaPegawai = $this->UserPerusahaan->getPegawai();
		$this->load->view('divisi/customerservice/cs-pesantkm.php',[
			//'semuaPegawai' => $semuaPegawai,
			'acc_indicator' => $this->acc_indicator,
			'topbar' => $this->load->view('topbar',[],true),
			'sidebarCS' => $this->load->view('sidebarCS',[
				'nama_hal' => 'pesan-tkm'
			], true)
		]);
	}


}
