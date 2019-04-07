<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Login
	 */
	public function index()
	{	
		$this->form_validation->set_rules('user_email', _l('email_field'), 'trim|valid_email');
        $this->form_validation->set_rules('user_password', _l('password_field'), 'trim|required|callback_ValidateLogin');
    
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $data['content'] = $this->load->view('page-login', '', true);
            $this->load->view('templates/template', $data);
        } else {
				set_message(_l('login_success_msg'), 'success');
				redirect('user_profile');
        }
	}
	
    /**
     * @return bool
     */
    function ValidateLogin()
    {
        if ($this->input->post('user_password') != '') {

            $email = $this->input->post('user_email');
            $password = md5($this->input->post('user_password'));
            
            $where['email'] = $email;
            $where['password'] = $password;
            $result = $this->common_model->get('users', $where);
			
            if ($result->num_rows() > 0) {
                $user_data = $result->row();
                    $this->session->set_userdata('User_LoginId', $user_data->user_id);
                    $this->session->set_userdata('User_UserName', $user_data->first_name.' '.$user_data->second_name);
					//Activate the Account
					$this->common_model->update('users', ['user_status' => 1], ['user_id' => $this->session->userdata('User_LoginId')]);
                    return true;
            }else{
				$this->form_validation->set_message('ValidateLogin', _l('username_pass_inv_msg'));
                return false;
			}
        }
        return false;
    }

    function logout()
    {
        $this->session->unset_userdata('User_LoginId');
        $this->session->unset_userdata('User_UserName');
        redirect('login');
    }    
	
	function change_password()
    {
        $this->form_validation->set_rules('confirm_password', _l('cnfrm_pass_field'), 'trim|required');
        $this->form_validation->set_rules('password', _l('password_field'), 'trim|required|matches[confirm_password]|min_length[8]');
    
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Change Password';
			$data['content'] = $this->load->view('page-change-password', '', true);
			$this->load->view('templates/template', $data);
        } else {
			
			$verifying_code = $this->input->post('code');
			$user_id = $this->input->post('u_id');
			if($verifying_code != '' && $user_id != ''){
				$email_token = $this->common_model->get('users', ['user_id' => $user_id], 'email_token');
				if($email_token->num_rows() > 0){
					$email_token = $email_token->row()->email_token;
					if($email_token == $verifying_code && $user_id != ''){
						$where['user_id'] = $user_id;
						$data['password'] = md5($this->input->post('password'));
						$this->common_model->update('users', $data, $where);
						set_message(_l('chng_pass_success_msg'), 'success');
					}else{
							set_message(_l('pass_rec_error_msg'), 'warning');
						}
				}
			}
			redirect('login');
        }
    }

    function forget_password()
    {
		$this->form_validation->set_rules('verification_email', _l('email_field'), 'trim|valid_email');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Forget Password';
            $data['content'] = $this->load->view('page-forget-password', '', true);
            $this->load->view('templates/template', $data);
        } else {
			$email = $this->input->post('verification_email');
			
				$res = $this->common_model->get('users', ['email' => $email], 'email, first_name, user_id');
				if($res->num_rows() > 0){
					$result = $res->row();
					$name = $result->first_name;
					$email = $result->email;
					$user_id = $result->user_id;
					
					$verification_Code	= md5(md5(time()));
					$arrgs = [
						'to' => $email,
						'subject' => 'Myecocar Recover Password',
						'txt' => 'Hi '.$name.',<br>'.'Recover Password Email has been send to your registered email address please verify your email address by clicking on the link below<br><a href="'.base_url("login/change_password?code=".$verification_Code.'&u_id='.$user_id).'">Click Here</a>'
					];
					$res = send_email($arrgs);
					
					if($res){
						$token_update['email_token'] = $verification_Code;
						$this->common_model->update('users', $token_update, ['user_id' => $user_id]);
						set_message(_l('rec_pass_email_msg'), 'success');
					}
				
				}else{ 
					set_message(_l('email_dont_exist_msg'), 'success');
				}
			redirect('login/forget_password');	
        }
    }
	
}
