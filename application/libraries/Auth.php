<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth{
	private $secret = "mysecret";
	function doAuth(){
		$CI =& get_instance();
		if(!$CI->session->userdata('username')){
			redirect('/','refresh');
			die();
		}
	}

	function isAuthUser($token){
		$atoken = explode('.',$token);
		if(count($atoken) < 2) return false;
		$username = $atoken[0];
		$sig = $atoken[1];
		if($sig != hash_hmac('SHA256', $username, $this->secret)){
			return false;
		}else{
			return true;
		}
	}

	function generateToken($username){
		$sig = hash_hmac('SHA256',$username,$this->secret);
		return "$username.$sig";
	}

	function getUserByToken($token){
		$atoken = explode('.',$token);
		if(count($atoken) < 2) return false;
		$username = $atoken[0];
		return $username;
	}
}