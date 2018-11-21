<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_keuangan extends CI_Controller {
	public $acc_indicator;
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->acc_indicator = $this->load->view('acc-indicator',[
			'username' => $this->session->userdata('username'),
		], true);
	}
	
	public function laporanKeuangan(){
		$this->auth->doAuth();
		$this->load->model('Keuangan');
		$keuntungan = $this->Keuangan->all();
		$this->load->view('divisi/profitablemeasure/pm-laporankeuangan.php',[
			'keuntungan' => $keuntungan,
			'acc_indicator' => $this->acc_indicator,
			'topbar' => $this->load->view('topbar',[],true),
			'sidebarPM' => $this->load->view('sidebarPM',[
				'nama_hal' => 'pm-laporankeuangan'

			], true)
		]);
	}
	public function gantiPersentase(){
		$this->auth->doAuth();
		$data = $this->input->post("persentase");
		$this->load->model('Keuangan');
		$keuntungan = $this->Keuangan->gantiPersentase($data);
		redirect('/pm/laporankeuangan', 'refresh');
	}

	//belom bener
	public function transaksiPedagang(){
		$this->auth->doAuth();
		$this->load->model('Transaksi');
		$semuaTransaksi = $this->Transaksi->all();
		$this->load->view('divisi/profitablemeasure/pm-transaksipdgpbl.php',[
			'semuaTransaksi' => $semuaTransaksi,
			'acc_indicator' => $this->acc_indicator,
			'topbar' => $this->load->view('topbar',[],true),
			'sidebarPM' => $this->load->view('sidebarPM',[
				'nama_hal' => 'pm-transaksipdgpbl'

			], true)
		]);
	}


	//belom bener
	public function laporanBeliSaldo(){
		$this->auth->doAuth();
		$this->load->model('Keuangan');
		$semuaPedagang = $this->Pedagang->all();
		$this->load->view('divisi/profitablemeasure/pm-laporanbelisaldo.php',[
			'semuaPegawai' => $semuaPedagang,
			'acc_indicator' => $this->acc_indicator,
			'topbar' => $this->load->view('topbar',[],true),
			'sidebarPM' => $this->load->view('sidebarPM',[
				'nama_hal' => 'pm-laporanbelisaldo'

			], true)
		]);
	}

	public function approveSaldo(){
		$this->auth->doAuth();
		$this->load->model('Keuangan');
		$approve = $this->Keuangan->topup();
		redirect('/pm/laporanbelisaldo', 'refresh');	
	}


	//belom bener
	public function laporanBeliPromo(){
		$this->auth->doAuth();
		$this->load->model('Pedagang');
		$semuaPedagang = $this->Pedagang->all();
		$this->load->view('divisi/profitablemeasure/pm-laporanbelipromo.php',[
			'semuaPegawai' => $semuaPedagang,
			'acc_indicator' => $this->acc_indicator,
			'topbar' => $this->load->view('topbar',[],true),
			'sidebarPM' => $this->load->view('sidebarPM',[
				'nama_hal' => 'pm-laporanbelipromo'

			], true)
		]);
	}


	//belom bener
	public function laporanWithdraw(){
		$this->auth->doAuth();
		$this->load->model('Pedagang');
		$semuaPedagang = $this->Pedagang->all();
		$this->load->view('divisi/profitablemeasure/pm-laporanwithdraw.php',[
			'semuaPegawai' => $semuaPedagang,
			'acc_indicator' => $this->acc_indicator,
			'topbar' => $this->load->view('topbar',[],true),
			'sidebarPM' => $this->load->view('sidebarPM',[
				'nama_hal' => 'pm-laporanwithdraw'

			], true)
		]);
	}

}
