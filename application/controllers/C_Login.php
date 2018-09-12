<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Login extends CI_Controller {
	public function index()
	{
		$this->load->model('UserPerusahaan');
		$this->load->library('session');
		$method = $this->input->method();
		if($method == 'post'){
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$data = $this->UserPerusahaan->isExist($username,$password);
			if($data){
				$this->session->set_userdata([
					'username' => $username
				]);


				echo 'ini username '.$username.'<br>';
				//print_r($data);
				
				if ($data[0]->status == 1) {	
					redirect('/reviewer/pedagang');
					
				}else if ($data[0]->status == 2) {

					redirect('/pm/laporankeuangan');

				}else if ($data[0]->status == 3) {

					redirect('/cs/pesanmasuk');

				}else if($data[0]->status == 4) {
					
					redirect('/admin/pegawai');					
				}
				/**$this->session->set_userdata([
					'username' => $username
				]);
				redirect('/reviewer/pedagang');*/
				//echo $this->session->userdata('username');
			}else{
				// redirect('/login');
				echo "Akun Tidak Ditemukan";
				redirect('/login');
				
			}
		// }else if($method == 'get'){
		// 	$this->load->view('login');
		}else{
			$this->load->view('/login');
		}
	}

	public function logout(){
		$this->load->library('session');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('password');
		$this->session->sess_destroy();
		redirect('http://mamafood.com', 'refresh');
		//redirect('/login');
		//$this->load->view('logout');
		// redirect('/login');
		//$this->load->view('login');

	}
}
