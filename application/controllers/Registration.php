<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {

	/**
	 * Registeration
	 */
	public function index(){
		$this->form_validation->set_rules('first_name', 'First name', 'trim|required');
		$this->form_validation->set_rules('second_name', 'Second name', 'trim|required');
		$this->form_validation->set_rules('reg_gender', 'Gender', 'trim|required');
		$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');
		$this->form_validation->set_rules('date_of_birth', 'Date of Birth', 'trim|required');
		$this->form_validation->set_rules('reg_email', 'Email', 'trim|valid_email|callback_Check_email');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[confirm_password]|min_length[8]');
    
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Sigup';
            $data['content'] = $this->load->view('page-registration', '', true);
			$this->load->view('templates/template', $data);
        } else {
	
			$data['first_name'] = $this->input->post('first_name');
			$data['second_name'] = $this->input->post('second_name');
			$data['gender'] = $this->input->post('reg_gender');
			$data['mobile'] = $this->input->post('mobile');
			$data['date_of_birth'] = date('Y-m-d H:i:s', strtotime($this->input->post('date_of_birth')));
			$data['email'] = $this->input->post('reg_email');
			$data['password'] = md5($this->input->post('password'));
			$data['term_conditions'] = ($this->input->post('term_conditions') == 'on') ? 1 : 0;
			$data['register_datetime'] = date('Y-m-d H:i:s');

			$user_id = $this->common_model->insert('users', $data);
			if($user_id ){
				$verification_Code	= md5(md5(time()));
				//send email
				if($data['email']){	
					$arrgs = [
						'to' => $data['email'],
						'subject' => 'Myecocar Registeration Email Verification',
						'txt' => 'Hi '.$data['first_name'].',<br>'.'You have successfully registered to Myecocar please verify your email address by clicking on the link below<br><a href="'.base_url("registration/verifying_email?code=".$verification_Code.'&u_id='.$user_id).'">Click Here</a>'
					];
					$res = send_email($arrgs);
					if($res){
						$token_update['email_token'] = $verification_Code;
						$this->common_model->update('users', $token_update, ['user_id' => $user_id]);
					}
				}
			}
			
			set_message('You Have Register Successfully Please verify your Email address first to login', 'success');
			redirect('registration');
			
        }
		
	}

	function Check_email(){
		$where['email'] = $this->input->post('reg_email');
		$res = $this->common_model->get('users', $where);
		if ($res->num_rows() > 0) {
			$this->form_validation->set_message('Check_email', 'This email is already registered.');
            return false;
		}
		 
	}
	
	function mobile_verification(){
		$mobile_number = $this->input->post('mobile_number');

		if($mobile_number != ''){
			$url="https://www.envoyersmspro.com/api/message/send";
			$verification_code = rand('000001', '999999');
		
			$this->session->set_userdata('verification_code', $verification_code);
			$this->session->set_userdata('verification_mobile_number', $mobile_number);
			
			$msg = "Your Verifivation Code for Myecocar is ".$verification_code;
	 
			//the parameters to pass to the server in POST
			$myPostParams="text=".urlencode($msg)."&recipients=".$mobile_number."&sendername=Myecocar";
			 
			//Query configuration
			$requestConfig = array( 'http' => array(
									'method' => 'POST',
									'header'=>"Authorization: Basic ".base64_encode(ENVOYERSMSPRO_LOGIN.":".ENVOYERSMSPRO_PASSWORD)."\r\n"
									."Content-type: application/x-www-form-urlencoded\r\n",
									'content' => $myPostParams
									));
			 
			//Return of the server
			$response = file_get_contents($url, false, stream_context_create($requestConfig));
			if($response){
				echo json_encode(['action' => 'success', 'msg' => 'Message has been send to your mobile number successfully']);
			}else{
				echo json_encode(['action' => 'error', 'msg' => 'There is some problem to send message']);
			}
		}else{
			echo json_encode(['action' => 'warning', 'msg' => 'Before Send Message Please Fill this Field.']);
		}
	}

	// verifying email
	public function verifying_email(){
		$verifying_code = $this->input->get('code');
		$user_id = $this->input->get('u_id');
		$email_token = $this->common_model->get('users', ['user_id' => $user_id], 'email_token');
		if($email_token->num_rows() > 0){
			$email_token = $email_token->row()->email_token;
			if($email_token == $verifying_code){
				$verified['is_verified'] = 1;
				$this->common_model->update('users', $verified, ['user_id' => $user_id]);
				set_heading_message('You have successfully verified your email address');
			}else{
				set_heading_message('Sorry! Your Security verifing link in invalid');
			}
		}
	}
}
