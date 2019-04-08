<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class How_its_work extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }
	
	public function index(){ 
		
        $data['title']              = 'Cookies';
		$data['content'] = $this->load->view('add_vehicle', '', true);
		$this->load->view('templates/template', $data);
		
	}
	
}