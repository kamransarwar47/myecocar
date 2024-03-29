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
        $this->form_validation->set_rules('captcha', 'Captcha', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Contactus';
            $data['content']      = $this->load->view('page-contacts', $data, true);
            $this->load->view('templates/template', $data);
        } else {
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$descriptions = $this->input->post('descriptions');
			$subject = $this->input->post('subject');
			$captcha = $this->input->post('captcha');

			if(isset($_SESSION['captcha']) && $_SESSION['captcha'] != $captcha){
				set_message('Incorrect security code entered', 'warning');
				redirect('contact_us');
			}

			if($email != ''){	
					$arrgs = [
						'to' => 'contact@myecocar.org',
						'subject' => $subject,
						'txt' => 'Hi '.$name.',<br>'.$descriptions,
					];
					$res = send_email($arrgs, $email);
					
					if($res){
						set_message('Your Message has been send successfully', 'success');
					}else{
						set_message('There is some problem to send message', 'success');
					}
				}
			redirect('contact_us');
		}
	
	}

	public function load_captcha(){
		$this->load->library('captcha/SimpleCaptcha');
		$captcha = new SimpleCaptcha();
		$captcha->CreateImage();
	}
}