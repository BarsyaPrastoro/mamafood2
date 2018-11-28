<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class C_API extends CI_Controller {

	//SIGNUP PEMESAN
	function signUp(){
		if($this->input->method() != "post") return;
		$data = json_decode( file_get_contents('php://input') );


		$this->load->model('user');

		$query = $this->user->signUpPemesan((array)$data);

		if($query == true) {
			$outputData = (object)array(
				'status' => true,
				'msg' => 'Register Success',
				'redirect' => 'home'  
			);
		} 
	}

	function editUser($id){
		if($this->input->method() != "post") return;
		header('Content-Type: application/json');
		$this->load->model('user');
		$token = $this->input->get_request_header('Authorization', true);

		if($this->auth->isAuthUser($token)){

			$data = [];
			$req = json_decode( file_get_contents('php://input') );
			$username = $this->auth->getUserByToken($token);

			$userdata = $this->user->getByUser($username);

			$data['idUser'] = $userdata->idUser;
			$id = $data['idUser'];

			$data['nama'] = $req->nama;
			$data['password'] = $req->password;
			$data['emailUser'] = $req->email;
			$data['noTelpon'] = $req->noTelpon;
			$data['Alamat'] = $req->alamat;

			$res = $this->user->updatePemesan($id, $data);
			echo json_encode([
				"status" => "OK"        
			]);
		}
		else{
			echo json_encode([
				"status" => "NOK",
				"message" => "Invalid Token"        
			]);
		}
	}

	//SIGNUP PEDAGANG

	function signUpPedagang(){
		if($this->input->method() != "post") return;
		header('Content-Type: application/json');	

		$this->load->model('user');
		$this->load->model('Pedagang');
		$this->load->library('Auth');
		
		$token = $this->input->get_request_header('Authorization', true);	


		// echo json_encode([
		// 		"token" => $token       
		// 	]);

		if ($this->auth->isAuthUser($token)) {
			$username = $this->auth->getUserByToken($token);
			$user  =(array) $this->user->getByUser($username);
			$data = [];
			$req = json_decode( file_get_contents('php://input') );
			$id = $user['idUser'];
			$data['idPedagang'] = $user['idUser'];
			// $data['fotoKtp'] = $req->fotoKtp;
			
			$this->db->trans_start();
			$resdb = $this->Pedagang->insert($data);
			$query = $this->user->signUpPedagang($id);
			$this->db->trans_complete();
			echo json_encode([
				"status" => "OK"        
			]);	
		}else{
			echo json_encode([
				"status" => "NOK",
				"message" => "BAD REQUEST"        
			]);
		}


	}

	// API Menu home pembeli

	function menu(){
		if ($this->input->method() === "post") return $this->insertMenu();
		if ($this->input->method() != "get") return;
		header('Content-Type: application/json');
		$this->load->model('Menu');
		$this->load->model('user');
		$token = $this->input->get_request_header('Authorization', true);
		if($this->auth->isAuthUser($token)){
			$sortby = $this->input->get('sortby',true);
			$sortdir = $this->input->get('sortdir',true);
			if (empty($sortby)) {
				$sortby = "namaMenu";
			}
			if (empty($sortdir)) {
				$sortdir = "asc";
			}
			$username = $this->auth->getUserByToken($token);
			$user = $this->user->getByUser($username);
			$cols = ['idMenu','namaMenu','hargaMenu','deskripsiMenu', 'namaPedagang','fotoMenu'];
			$filter =  [];
			if(intval($user->role) === 1){
				$filter =  [
					'idPedagang' => $user->idUser,
					'status' => 1
				];
				$cols = ['*'];
			}else if(intval($user->role) === 0){
				$filter =  [
					'status' => 1
				];
				$cols = ['*'];
			}
			$menu = $this->Menu->all($cols,$sortby, $sortdir, $filter);
			
			echo json_encode($menu);
		}else{
			echo json_encode([
				"status" => "NOK",
				"message" => "Invalid Token"        
			]);
		}
	}

	//API Menu detail untuk pembeli

	function oneMenu($id){
		if ($this->input->method() != "get") return;

		$this->load->model('Menu');


		$token = $this->input->get_request_header('Authorization', true);
		header('Content-Type: application/json');
		if($this->auth->isAuthUser($token)){
			$this->load->model('user');
			$username = $this->auth->getUserByToken($token);
			$user = $this->user->getByUser($username);
			$filter = [
				'idMenu' => $id
			];
			$cols = ['idMenu','namaMenu','hargaMenu','deskripsiMenu', 'namaPedagang','fotoMenu'];
			if(intval($user->role) === 1){
				$filter = [
					'idMenu' => $id,
					'idPedagang' => $user->idUser
				];
				$cols = ['*'];
			}
			$menu = $this->Menu->one($cols,$filter);
			if(!$menu){
				echo json_encode([
					"status" => "NOK"
				]);
			}else{
				echo json_encode($menu);	
			}
			
		}else{
			echo json_encode([
				"status" => "NOK",
				"message" => "Invalid Token"        
			]);
		}

	}

	//API MENU PEDAGANG 1 ID

	function menuPedagang($idPedagang){
		if ($this->input->method() != "get") return;

		$this->load->model('Menu');

		$token = $this->input->get_request_header('Authorization', true);
		header('Content-Type: application/json');
		if($this->auth->isAuthUser($token)){

			$menu = $this->Menu->all(['idMenu','namaMenu','fotoMenu','deskripsiMenu','hargaMenu'],'namaMenu','asc',[
				'idPedagang' => $idPedagang

			]);

			
			echo json_encode($menu);
		}else{
			echo json_encode([
				"status" => "NOK",
				"message" => "Invalid Token"        
			]);
		}

	}

	function insertMenu(){

		if($this->input->method() != "post") return;
		header('Content-Type: application/json');
		$this->load->model('menu');
		$this->load->library('auth');
		$this->load->model('user');

		$token = $this->input->get_request_header('Authorization', true);

		if($this->auth->isAuthUser($token)){
			// $menu = $this->Menu->one($id);
			// header('Content-Type: application/json');
			// echo json_encode($menu);
			

			$data = [];
			
			log_message('error', "before"); 
			$req = json_decode( file_get_contents('php://input') );
			log_message('error', "after");
			$data['namaMenu'] = $req->namaMenu;
			$data['hargaMenu'] = $req->hargaMenu;
			$data['deskripsiMenu'] = $req->deskripsiMenu;
			$data['fotoMenu'] = $req->fotoMenu;

			$username = $this->auth->getUserByToken($token);

			$userdata = $this->user->getByUser($username);

			$data['idPedagang'] = $userdata->idUser;

			//$this->db->trans_begin();

			log_message('error', "before sql");
			$resdb = $this->menu->insert($data);
			log_message('error', "after sql");
			$idMenu = $this->db->insert_id();
			//$this->db->trans_commit();
			echo json_encode([
				"status" => "OK"        
			]);
		}
		else{
			echo json_encode([
				"status" => "NOK",
				"message" => "Invalid Token"        
			]);
		}
	}

	

	function listPedagang(){
		if ($this->input->method() != "get") return;
		header('Content-Type: application/json');
		$this->load->model('Pedagang');
		$token = $this->input->get_request_header('Authorization', true);
		if($this->auth->isAuthUser($token)){
			
			$menu = $this->Pedagang->all();
			
			echo json_encode($menu);
		}else{
			echo json_encode([
				"status" => "NOK",
				"message" => "Invalid Token"        
			]);
		}
	}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//transaksi

	function pesanMenu(){
		if($this->input->method() != "post") return;
		header('Content-Type: application/json');
		$this->load->model('Transaksi');
		$this->load->library('auth');
		$this->load->model('User');
		$this->load->model('Menu');
		$this->load->model('Saldo');

		

		$token = $this->input->get_request_header('Authorization', true);

		if($this->auth->isAuthUser($token)) {
			// $menu = $this->Menu->one($id);
			// header('Content-Type: application/json');
			// echo json_encode($menu);
			

			$data = [];
			
			log_message('error', "before"); 
			$req = json_decode( file_get_contents('php://input') );
			log_message('error', "after");
			// $data['id_pemesan'] = $req->namaMenu;
			// $data['hargaMenu'] = $req->hargaMenu;
			// $data['deskripsiMenu'] = $req->deskripsiMenu;
			// $data['fotoMenu'] = $req->fotoMenu;

			$username = $this->auth->getUserByToken($token);

			$userdata = $this->User->getByUser($username);

			$this->db->trans_begin();

			log_message('error', "before sql");
			$idTransaksi = $this->Transaksi->doTransaksi([
				'idPemesan' => $userdata->idUser,
				'idPedagang' => $req->id_pedagang,
				'jenisPembayaran' => $req->jenis_pembayaran,
				'jenisPengambilan' => $req->jenis_pengambilan
			]);
			

			$orders = $req->orders;
			$menu2kuantitas = [];
			$order_ids = array_map(function($order){return $order->id_menu;}, $orders);
			foreach($orders as $order){
				$menu2kuantitas[$order->id_menu] = $order->kuantitas;
			}

			$menus = $this->Menu->all(['hargaMenu','idMenu'],'idMenu','asc',[
				'idPedagang' => $req->id_pedagang,
				'idMenu' => $order_ids
			]);

			$total = 0;

			foreach($menus as $menu){
				$total += $menu->hargaMenu * $menu2kuantitas[$menu->idMenu];
				$this->Transaksi->beliMenu([
					'idTransaksi' => $idTransaksi,
					'idPemesan' => $userdata->idUser,
					'idMenu' => $menu->idMenu,
					'kuantitas' => $menu2kuantitas[$menu->idMenu]
				]);
			}

			$saldoInfo = $this->Saldo->saldoUser($userdata->idUser);

			if ($req->jenis_pembayaran == 0) {
				//mamapay
				if($total > $saldoInfo['jumlah']){
					$this->db->trans_rollback();
					echo json_encode([
						"status" => "NOK",
						"message" => "Saldo anda tidak mencukupi untuk melakukan transaksi ini"      
					]);
				}else{

					$this->Transaksi->updateTotalHarga($idTransaksi,$total);
					$this->db->trans_commit();
					echo json_encode([
						"status" => "OK"        
					]);				
				}
			}else{
				//cash
				$this->Transaksi->updateTotalHarga($idTransaksi,$total);
				$this->db->trans_commit();
				echo json_encode([
					"status" => "OK"        
				]);
			}

			

		}
		else{
			echo json_encode([
				"status" => "NOK",
				"message" => "Invalid Token"        
			]);
		}
	}

	function approveOrder($idTransaksi){
		if($this->input->method() != "get") return;
		header('Content-Type: application/json');
		$this->load->model('Transaksi');
		$this->load->library('auth');
		$this->load->model('User');
		$this->load->model('Menu');
		$this->load->model('Saldo');
		$this->load->model('Keuangan');
		$persentase =$this->Keuangan->persentase() ;
		

		$token = $this->input->get_request_header('Authorization', true);
		if($this->auth->isAuthUser($token)) {
			$username = $this->auth->getUserByToken($token);
			$userdata = $this->User->getByUser($username);
			$transaksi = $this->Transaksi->one($idTransaksi);


			if($userdata->role == 1 && $userdata->idUser == $transaksi->id_pedagang){
				$this->db->trans_begin();
				
				if($transaksi->jenis_pembayaran == 0){
					//mamapay
					if ($this->Saldo->saldoUser($transaksi->id_pemesan) < $transaksi->total_harga) {
						$this->db->trans_rollback();
						echo json_encode([
							"status" => "NOK",
							"message" => "Saldo pemesan anda tidak mencukupi untuk melakukan transaksi ini"    
						]);
					}else{
						if ($this->Saldo->saldoUser($transaksi->id_pedagang) < $transaksi->total_harga * $persentase / (100.0 + $persentase)){
						//if($this->Saldo->pay($transaksi->id_pemesan,$transaksi->total_harga)){
							$this->db->trans_rollback();
							echo json_encode([
								"status" => "NOK",
								"message" => "Saldo pedagang anda tidak mencukupi untuk melakukan transaksi ini"    
							]);
						}else{
							$this->Transaksi->payTransaction($idTransaksi);
							$this->Saldo->pay($transaksi->id_pemesan, $transaksi->total_harga);
							$this->Saldo->receive($transaksi->id_pedagang, $transaksi->total_harga - ($transaksi->total_harga * $persentase / (100.0 + $persentase)) );
							$this->Transaksi->approveTransaction($idTransaksi);
							//TODO: tambah ke penjualan/pembukuan
							//kategori 0 dari jualbeli
							$this->Keuangan->insert($transaksi->total_harga * $persentase / (100.0 + $persentase), 0);
							$this->db->trans_commit();
							echo json_encode([
								"status" => "OK"        
							]);
						}
					}

				}else{
					//cash
					if ($this->Saldo->saldoUser($transaksi->id_pedagang) < $transaksi->total_harga * $persentase / (100.0 + $persentase)) {
						$this->db->trans_rollback();
						echo json_encode([
							"status" => "NOK",
							"message" => "saldo tidak cukup untuk menerima orderan ini"       
						]);
					}else{
						$this->Transaksi->approveTransaction($idTransaksi);
						$this->db->trans_commit();
						echo json_encode([
							"status" => "OK"       
						]);
					}
					
				}
			}else{
				//not pedagang error
				echo json_encode([
					"status" => "NOK",
					"message" => "Not Authorized"    
				]);
			}
		}else{
			echo json_encode([
				"status" => "NOK",
				"message" => "Invalid Token"        
			]);
		}
	}

	function cancel($idTransaksi){
		if($this->input->method() != "get") return;
		header('Content-Type: application/json');
		$this->load->model('Transaksi');
		$this->load->library('auth');
		$this->load->model('User');
		$this->load->model('Menu');
		$this->load->model('Saldo');
		$this->load->model('Keuangan');
		$persentase =$this->Keuangan->persentase() ;
		

		$token = $this->input->get_request_header('Authorization', true);

		if($this->auth->isAuthUser($token)) {
			$username = $this->auth->getUserByToken($token);
			$userdata = $this->User->getByUser($username);
			$transaksi = $this->Transaksi->one($idTransaksi);

			if ($userdata == $transaksi->id_pedagang || $userdata == $transaksi->id_pemesan) {
				if ($transaksi->status_approval == 1) {
					$this->db->trans_rollback();
					echo json_encode([
						"status" => "NOK",
						"message" => "Pesanan sudah diterima, tidak bisa membatalkan"       
					]);
				}else{
					$this->Transaksi->cancelTransaction($idTransaksi);
					$this->db->trans_commit();
					echo json_encode([
						"status" => "OK",
						"message" => "Pesanan dibatalkan"    
					]);
				}

			}else{
				echo json_encode([
					"status" => "NOK",
					"message" => "Not Authorized"    
				]);
			}

			
		}else{
			echo json_encode([
				"status" => "NOK",
				"message" => "Invalid Token"        
			]);
		}
	}

	function orderReady($idTransaksi){
		if($this->input->method() != "get") return;
		header('Content-Type: application/json');
		$this->load->model('Transaksi');
		$this->load->library('auth');
		$this->load->model('User');
		$this->load->model('Menu');
		$this->load->model('Saldo');
		$this->load->model('Keuangan');
		$persentase =$this->Keuangan->persentase() ;
		

		$token = $this->input->get_request_header('Authorization', true);
		if($this->auth->isAuthUser($token)) {
			$username = $this->auth->getUserByToken($token);
			$userdata = $this->User->getByUser($username);
			$transaksi = $this->Transaksi->one($idTransaksi);


			if($userdata->role == 1 && $userdata->idUser == $transaksi->id_pedagang){

				if ($transaksi->jenis_pembayaran == 0) {
					//mamapay
					//if($this->Saldo->pay($transaksi->id_pemesan,$transaksi->total_harga)){
					$this->Transaksi->processTransaction($idTransaksi);
					$this->db->trans_commit();
					echo json_encode([
						"status" => "OK",
						"message" => "makanan siap"    
					]);
					// }else{
					// 	$this->db->trans_rollback();
					// 	echo json_encode([
					// 		"status" => "NOK",
					// 		"message" => "Saldo anda tidak mencukupi untuk melakukan transaksi ini"    
					// 	]);
					// }	
				}else{
					//cash
					if ($this->Saldo->saldoUser($transaksi->id_pedagang) < $transaksi->total_harga * $persentase / (100.0 + $persentase)) {
						$this->db->trans_rollback();
						echo json_encode([
							"status" => "NOK",
							"message" => "saldo tidak cukup untuk menerima orderan ini"       
						]);
					}else{
						$this->Transaksi->processTransaction($idTransaksi);
						$this->db->trans_commit();
						echo json_encode([
							"status" => "OK"       
						]);
					}
				}

				
				
			}else{
				//not pedagang error
				echo json_encode([
					"status" => "NOK",
					"message" => "Not Authorized"    
				]);
			}
		}else{
			echo json_encode([
				"status" => "NOK",
				"message" => "Invalid Token"        
			]);
		}
	}

	function orderEnd($idTransaksi){
		if($this->input->method() != "get") return;
		header('Content-Type: application/json');
		$this->load->model('Transaksi');
		$this->load->library('auth');
		$this->load->model('User');
		$this->load->model('Menu');
		$this->load->model('Saldo');
		$this->load->model('Keuangan');
		$persentase =$this->Keuangan->persentase() ;
		
		

		$token = $this->input->get_request_header('Authorization', true);
		if($this->auth->isAuthUser($token)) {
			$username = $this->auth->getUserByToken($token);
			$userdata = $this->User->getByUser($username);
			$transaksi = $this->Transaksi->one($idTransaksi);


			if($userdata->role == 1 && $userdata->idUser == $transaksi->id_pedagang){
				if ($transaksi->status_pesanan == 1) {

					if($transaksi->jenis_pembayaran == 1){
						//cek lagi kalo si saldo pedagangnya beneran bisa bayar kita
						if($this->Saldo->saldoUser($transaksi->id_pedagang) > $transaksi->total_harga * $persentase / (100.0 + $persentase)){
							$this->Saldo->pay($transaksi->id_pedagang, $transaksi->total_harga * $persentase / (100.0 + $persentase));
							$this->Keuangan->insert($transaksi->total_harga * $persentase / (100.0 + $persentase), 0);
							$this->Transaksi->payTransaction($idTransaksi);
							$this->Transaksi->transactionEnd($idTransaksi);
							echo json_encode([
								"status" => "OK",
								"message" => "transaksi selesai"    
							]);
						}else{
							$this->db->trans_rollback();
							echo json_encode([
								"status" => "NOK",
								"message" => "Saldo anda tidak mencukupi untuk melakukan transaksi ini"    
							]);
						}
						
					}else if($transaksi->jenis_pembayaran == 0){
						//mamapay
						
						$this->Transaksi->transactionEnd($idTransaksi);
						echo json_encode([
							"status" => "OK",
							"message" => "transaksi selesai"    
						]);
						

					}else{
						echo json_encode([
							"status" => "NOK",
							"message" => "mayarna make naon?"    
						]);
					}

				}else{
					echo json_encode([
						"status" => "NOK",
						"message" => "makanan belom jadi"    
					]);
				}
				
			}else{
				//not pedagang error
				echo json_encode([
					"status" => "NOK",
					"message" => "Not Authorized"    
				]);
			}
		}else{
			echo json_encode([
				"status" => "NOK",
				"message" => "Invalid Token"        
			]);
		}
	}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	//SALDO UNTUK USER TERTENTU

	function saldoUser(){
		if ($this->input->method() != "get") return;
		header('Content-Type: application/json');
		$this->load->model('Saldo');
		$this->load->model('user');
		$token = $this->input->get_request_header('Authorization', true);
		if($this->auth->isAuthUser($token)){

			$username = $this->auth->getUserByToken($token);

			$userdata = $this->user->getByUser($username);

			$idUser = $userdata->idUser;

			//echo $idUser;

			$saldo = $this->Saldo->saldoUser($idUser);
			
			echo json_encode($saldo) ;
		}else{
			echo json_encode([
				"status" => "NOK",
				"message" => "Invalid Token"        
			]);
		}
	}

	function topUpSaldo(){
		if ($this->input->method() != "post") return;
		header('Content-Type: application/json');
		$this->load->model('Saldo');
		$this->load->model('user');
		$token = $this->input->get_request_header('Authorization', true);
		if($this->auth->isAuthUser($token)){

			$username = $this->auth->getUserByToken($token);

			$userdata = $this->user->getByUser($username);

			$idUser = $userdata->idUser;

			$req = json_decode( file_get_contents('php://input') );

			//echo $idUser;

			$this->Saldo->top_up([
				'id_user' => $userdata->idUser,
				'jumlah_topup' => $req->jumlah,
				'bukti_transfer' => $req->bukti_transfer
			]);



			echo json_encode([
				"status" => "OK",
				"message" => "wait"        
			]);
			
			//echo json_encode($saldo) ;
		}else{
			echo json_encode([
				"status" => "NOK",
				"message" => "Invalid Token"        
			]);
		}
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//LAPORAN 

	function laporan($statusPengambilan){
		if ($this->input->method() != "get") return;
		header('Content-Type: application/json');
		$this->load->model('Pedagang');
		$this->load->model('user');
		$token = $this->input->get_request_header('Authorization', true);
		if($this->auth->isAuthUser($token)){

			$username = $this->auth->getUserByToken($token);

			$userdata = $this->user->getByUser($username);

			$idUser = $userdata->idUser;

			// $data = [];

			// $req = json_decode( file_get_contents('php://input') );

			// $statusPengambilan = $req->status_pengambilan;

			//echo $idUser;

			$laporan = $this->user->laporanPedagang($idUser, $statusPengambilan);
			
			echo json_encode($laporan) ;
		}else{
			echo json_encode([
				"status" => "NOK",
				"message" => "Invalid Token"        
			]);
		}
	}

	function detailLaporan($idTransaksi){
		if ($this->input->method() != "get") return;
		header('Content-Type: application/json');
		$this->load->model('Pedagang');
		$this->load->model('user');
		$token = $this->input->get_request_header('Authorization', true);
		if($this->auth->isAuthUser($token)){

			$username = $this->auth->getUserByToken($token);

			$userdata = $this->user->getByUser($username);

			$idUser = $userdata->idUser;

			// $data = [];

			// $req = json_decode( file_get_contents('php://input') );

			// $statusPengambilan = $req->status_pengambilan;

			//echo $idUser;

			$laporan = $this->user->detailLaporanPedagang($idTransaksi);
			
			echo json_encode($laporan) ;
		}else{
			echo json_encode([
				"status" => "NOK",
				"message" => "Invalid Token"        
			]);
		}
	}

	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//PESAN
	function message(){
		if ($this->input->method() != "post") return;
		header('Content-Type: application/json');
		$this->load->model('Pesan');
		$this->load->model('user');
		$token = $this->input->get_request_header('Authorization', true);
		if($this->auth->isAuthUser($token)){

			$username = $this->auth->getUserByToken($token);

			$userdata = $this->user->getByUser($username);

			$idUser = $userdata->idUser;

			$req = json_decode( file_get_contents('php://input') );

			//echo $idUser;

			//$this->Pesan->insert($idUser, $req->isi);

			$this->Pesan->insert([
				'idUser' => $userdata->idUser,
				'isi' => $req->isi
			]);



			echo json_encode([
				"status" => "OK",
				"message" => "wait"        
			]);
			
			//echo json_encode($saldo) ;
		}else{
			echo json_encode([
				"status" => "NOK",
				"message" => "Invalid Token"        
			]);
		}
	}

}
