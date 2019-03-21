<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicle extends CI_Controller {

	/**
	 * vehicle
	 */
	public function add()
	{
		$data['content'] = $this->load->view('add_vehicle', '', true);
		$this->load->view('templates/template', $data);
	}

}
