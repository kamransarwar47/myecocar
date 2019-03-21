<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Research_trip extends CI_Controller {

	/**
	 * Page research trip
	 */
	public function index()
	{
		$data['content'] = $this->load->view('page-recherche-trajet', '', true);
		$this->load->view('templates/template', $data);
	}

}
