<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Home Page
	 */
	public function index()
	{
	    $data['header_link_active'] = 'home';
	    $data['title'] = 'Home';
		$data['content'] = $this->load->view('home', '', true);
		$this->load->view('templates/template', $data);
	}

}
