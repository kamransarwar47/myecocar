<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	/**
	 * About trip
	 */
	public function index()
	{
		$data['content'] = $this->load->view('page-about', '', true);
		$this->load->view('templates/template', $data);
	}

}
