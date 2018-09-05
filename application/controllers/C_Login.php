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
					header('location: /reviewer/pedagang');
					
				}else {
					echo "ora ono";					
				}
				/**$this->session->set_userdata([
					'username' => $username
				]);
				header('location: /reviewer/pedagang');*/
				//echo $this->session->userdata('username');
			}else{
				header('Location: /login');
				//redirect('login');
			}
		}else if($method == 'get'){
			$this->load->view('login');
		}else{
			echo "404";
		}
	}

	public function logout(){
		$this->load->library('session');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('password');
		$this->session->sess_destroy();
		//redirect('/login');
		//$this->load->view('logout');
		header('location: /login');
		//$this->load->view('login');

	}
}
