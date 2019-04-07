<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_us extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }
	
	public function index(){
		
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('descriptions', 'Descriptions', 'trim|required');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Contactus';
			//load library
			$this->load->library('securimage');
            $data['content']      = $this->load->view('page-contacts', $data, true);
            $this->load->view('templates/template', $data);
        } else {
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$descriptions = $this->input->post('descriptions');
			$subject = $this->input->post('subject');
			if($email != ''){	
					$arrgs = [
						'to' => $email,
						'subject' => $subject,
						'txt' => 'Hi '.$name.',<br>'.$descriptions,
					];
					$res = send_email($arrgs);
					
					if($res){
						set_message('Your Message has been send successfully', 'success');
					}else{
						set_message('There is some problem to send message', 'success');
					}
				}
			redirect('contact_us');
		}
	
	}
}