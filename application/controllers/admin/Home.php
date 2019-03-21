<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Home Page
	 */
	public function index()
	{
		$data['content'] = 'this ismme';//$this->load->view('admin/home', '', true);
		$this->load->view('admin/templates/template', $data);
	}

}
