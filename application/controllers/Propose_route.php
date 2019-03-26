<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Propose_route extends CI_Controller {

	/**
	 * Page Propose Route
	 */
	public function index()
	{
        $this->form_validation->set_rules('first_name', 'First name', 'trim|required');
        $this->form_validation->set_rules('second_name', 'Second name', 'trim|required');
        $this->form_validation->set_rules('reg_gender', 'Gender', 'trim|required');
        $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');
        $this->form_validation->set_rules('date_of_birth', 'Date of Birth', 'trim|required');
        $this->form_validation->set_rules('reg_email', 'Email', 'trim|valid_email|callback_Check_email');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[confirm_password]|min_length[8]');

        if ($this->form_validation->run() == false) {
            $data['content'] = $this->load->view('page-propose-route', '', true);
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
            $this->common_model->insert('users', $data);
            set_message('You Have Register Successfully', 'success');
            redirect('registration');
        }
	}

}
