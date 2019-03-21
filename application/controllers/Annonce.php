<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Annonce extends CI_Controller {

	/**
	 * Page Annonce
	 */
	public function index()
	{
		$data['content'] = $this->load->view('page-annonce', '', true);
		$this->load->view('templates/template', $data);
	}

}
