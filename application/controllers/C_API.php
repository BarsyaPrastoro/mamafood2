<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class C_API extends CI_Controller {
	
	function signUp(){
		if($this->input->method() != "post") return;

		$req = json_decode( file_get_contents('php://input') );

		$this->load->model('user');

		$query = $this->user->signUpPemesan((array)$req);

		if($query == true) {
			$outputData = (object)array(
				'status' => true,
				'msg' => 'Register Success',
				'redirect' => 'home'  
			);
		} 
	}

}
