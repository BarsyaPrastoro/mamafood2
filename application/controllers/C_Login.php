<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class C_Login extends CI_Controller {

	function __construct()
	{
	    parent::__construct(); 

	    $this->load->model('UserPerusahaan');    

	    $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
	        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
	        $this->output->set_header('Pragma: no-cache');
	        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");    
	}

	//LOGIN

	public function index()
	{
		$this->load->model('UserPerusahaan');
		$this->load->library('session');
		$method = $this->input->method();
		if($method == 'post'){
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$data = $this->UserPerusahaan->isExist($username,$password);
			if(count($data) === 1){
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
				redirect('/');
				
			}
		// }else if($method == 'get'){
		// 	$this->load->view('login');
		}else{
			$this->load->view('login');
		}
	}


	//LOGOUT

	public function logout(){
		// $this->load->library('session');
		// // $this->session->unset_userdata('username');
		// // $this->session->unset_userdata('password');
		// $array_items = array('username' => '', 'password' => '');
		// $this->session->unset_userdata($array_items);
		// $this->session->sess_destroy();
		// redirect('http://mamafood.com', 'refresh');
		// //redirect('/login');
		// //$this->load->view('logout');
		// // redirect('/login');
		// //$this->load->view('login');
		$newdata = array(
                'username'  =>'',
                'password' => '',
                'logged_in' => FALSE,
               );

	     $this->session->unset_userdata('username');
	     $this->session->sess_destroy();

	     redirect('/','refresh');

	}

	//LOGIN PEMESAN

	public function loginUser(){
		$req =(array) json_decode( file_get_contents('php://input') );
		$username = $req['username'];
		$password = $req['password'];
		$this->load->model('User');
		$data = $this->User->isExist($username, $password);
		if(count($data) === 1){
			header('Content-Type: application/json');
			echo json_encode([
				'status' => 'OK',
				'token' => $this->auth->generateToken($username)
			]);
		}else{
			header('Content-Type: application/json');
			echo json_encode([
				'status' => 'NOK',
				'message' => 'Login Gagal!'
			]);
		}
	}
	
	//TES LEMPAR EMAIL PEMESAN LEWAT JSON

	public function test(){
		$req = json_decode( file_get_contents('php://input') );
		$this->load->model('User');
		$token = $this->input->get_request_header('Authorization', true);
		if($this->auth->isAuthUser($token)){
			$user = $this->User->getByUser($this->auth->getUserByToken($token));
			header('Content-Type: application/json');
			echo json_encode([
				'status' => 'OK',
				'nama' => $user->namaUser,
				'noTelpon' => $user->noTelpon,
				'email' => $user->emailUser,
				//'role' => $user->role
			]);
		}else{
			header('Content-Type: application/json');
			echo json_encode([
				'status' => 'NOK'
			]);
		}
	}
}
//<FilesMatch "*"> Header set Access-Control-Allow-Origin "*"</FilesMatch>
