<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Charter extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }
	
	public function index(){
		
        $data['title']              = 'Cookies';
		$data['content'] = $this->load->view('page-charter', '', true);
		$this->load->view('templates/template', $data);
		
	}
	
}