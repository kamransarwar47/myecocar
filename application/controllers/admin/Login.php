<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Home Page
	 */
	public function index()
	{
		$this->load->view('admin/login/login');
	}

}
