<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Login
	 */
	public function index()
	{	
		$this->form_validation->set_rules('user_email', 'Email', 'trim|valid_email');
        $this->form_validation->set_rules('user_password', 'Password', 'trim|required|callback_ValidateLogin');
    
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $data['content'] = $this->load->view('page-login', '', true);
            $this->load->view('templates/template', $data);
        } else {
				set_message('Successfully Login', 'success');
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
                    return true;
            }else{
				$this->form_validation->set_message('ValidateLogin', 'User name or password is invalid.');
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
	
}
