<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Model {
	public $idMenu;
	public $idPedagang;
	public $namaMenu;
	public $hargaMenu;
	public $deskripsiMenu;
	public $fotoMenu;
	public $status;
	public $namaPedagang;

	//menu home pembeli

	public function all($cols,$sortby, $sortdir, $filter){
		$filter_str = "";
		foreach($filter as $key => $value){
			if(empty($filter_str)){
				$filter_str .= 'where ';
			}else{
				$filter_str .= '&& ';
			}
			if(is_array($value)){
				$in_str = implode(',',$value);
				$filter_str .= "$key in ($in_str) ";
			}else{
				$filter_str .= "$key = $value ";	
			}
		}
		$cols_str = implode(',',$cols);
		$query = $this->db->query("select $cols_str from  menu_pedagang $filter_str ORDER BY $sortby $sortdir");
		log_message("error","select $cols_str from  menu_pedagang $filter_str ORDER BY $sortby $sortdir");
		return $query->result();
	}	

	//menu detail 1 pembeli

	public function one($cols,$filter){
		$filter_str = "";
		foreach($filter as $key => $value){
			if(empty($filter_str)){
				$filter_str .= 'where ';
			}else{
				$filter_str .= '&& ';
			}
			$filter_str .= "$key = $value";

		}
		$cols_str = implode(',',$cols);
		$query = $this->db->query("select $cols_str from menu_pedagang $filter_str");
		$res = $query->result();

		if (count($res) > 0) {
			return $res[0];
		}else{
			return false;
		}		
	}


	//MENU untuk 1 pedagang

	public function allMenuPedagang($idPedagang){

		$query = $this->db->query("select * from menu_pedagang where idPedagang in(select idPedagang from menu_pedagang group by idPedagang having count(*) >= 1)" , [
			$idPedagang
		]);
		$res = $query->result();

		if (count($res) > 0) {
			return $res[0];
		}else{
			return false;
		}		
	}	

	///////////////////
	public function getMenuById($idMenu){
		$this->load->database();
		$query = $this->db->query("select * from menu where idMenu = ?", [
			$idMenu
		]);
		return $query->row_array();
	}

	public function insert($data){
		$idPedagang = $data['idPedagang'];
		$namaMenu = $data['namaMenu'];
		$hargaMenu = $data['hargaMenu'];
		$deskripsiMenu = $data['deskripsiMenu'];
		$fotoMenu = $data['fotoMenu'];
		$this->db->query("INSERT INTO menu
			(idPedagang, namaMenu, hargaMenu, deskripsiMenu, fotoMenu) 
			VALUES
			('$idPedagang','$namaMenu','$hargaMenu','$deskripsiMenu','$fotoMenu')"); 
	}

	public function approveMenu($idMenu){
		$data = array(
			'status' => 1

		);

		$this->db->where('idMenu', $idMenu);
		$this->db->update('menu', $data); 
	}
}
