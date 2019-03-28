<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_profile extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        is_user_login();
    }

    /**
     * Home Page
     */
    public function index()
    {

        $this->form_validation->set_rules('first_name', 'First name', 'trim|required');
        $this->form_validation->set_rules('second_name', 'Second name', 'trim|required');
        $this->form_validation->set_rules('reg_gender', 'Gender', 'trim|required');
        $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');
        $this->form_validation->set_rules('date_of_birth', 'Date of Birth', 'trim|required');
        $this->form_validation->set_rules('reg_email', 'Email', 'trim|valid_email|callback_Check_email');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Profile';
            // profile details
            $user_data         = $this->common_model->get('users', ['user_id' => $this->session->userdata('User_LoginId')]);
            $data['user_data'] = $user_data;
            // route details
            $route_data         = $this->common_model->get('route', ['user_id' => $this->session->userdata('User_LoginId')]);
            $data['route_data'] = $route_data;
            // reservation details
            $booking_data         = $this->common_model->get_reservations_by_user_id($this->session->userdata('User_LoginId'));
            $data['booking_data'] = $booking_data;
            $data['content']      = $this->load->view('page-profile', $data, true);
            $this->load->view('templates/template', $data);
        } else {

            $data['first_name']    = $this->input->post('first_name');
            $data['second_name']   = $this->input->post('second_name');
            $data['gender']        = $this->input->post('reg_gender');
            $data['mobile']        = $this->input->post('mobile');
            $data['date_of_birth'] = date('Y-m-d', strtotime($this->input->post('date_of_birth')));
            $data['email']         = $this->input->post('reg_email');
            $this->common_model->update('users', $data, ['user_id' => $this->session->userdata('User_LoginId')]);
            set_message('You Have Update your profile Successfully', 'success');
            redirect('user_profile');

        }

    }

    function Check_email()
    {
        if (!empty($this->input->post('reg_email'))) {
            $where['user_id !='] = $this->session->userdata('User_LoginId');
            $where['email']      = $this->input->post('reg_email');
            $res                 = $this->common_model->get('users', $where);

            if ($res->num_rows() > 0) {
                $this->form_validation->set_message('Check_email', 'This email is already registered.');
                return false;
            }
        }
    }

    function change_password()
    {
        if ($this->input->post()) {
            $res = $this->common_model->get('users', ['user_id' => $this->session->userdata('User_LoginId')], 'password');

            if ($res->num_rows() > 0) {
                $password             = $res->row_array()['password'];
                $new_password         = $this->input->post('new_password');
                $confirm_new_password = $this->input->post('confirm_new_password');
                if ($new_password == $confirm_new_password) {
                    if ($password == md5($this->input->post('current_password'))) {
                        if (strlen($this->input->post('new_password')) >= 8) {
                            $data['password'] = md5($this->input->post('password'));
                            $this->common_model->update('users', $data, ['user_id' => $this->session->userdata('User_LoginId')]);
                            set_message('You have changed your Password Successfully', 'success');
                        } else {
                            set_message('New Password length should be greater then or equal to 8', 'danger');
                        }
                    } else {
                        set_message('Your password is incorrect', 'danger');
                    }
                } else {
                    set_message('Your Confirm new password does not match', 'danger');
                }
            }
        }
        redirect('user_profile');
    }

    // approve booking
    public function approve_boooking()
    {
        if ($this->input->is_ajax_request()) {
            $result = $this->common_model->update('bookings', ['booking_status' => 'approved'], ['booking_id' => $this->input->post('booking_id')]);
            if ($result) {
                echo 'TRUE';
            } else {
                echo 'FALSE';
            }
        } else {
            exit('No direct script access allowed');
        }
    }

    // collect payment
    public function collect_payment()
    {
        if ($this->input->is_ajax_request()) {
            $result = $this->common_model->update('bookings', ['amount_status' => 'collected'], ['booking_id' => $this->input->post('booking_id')]);
            if ($result) {
                echo 'TRUE';
            } else {
                echo 'FALSE';
            }
        } else {
            exit('No direct script access allowed');
        }
    }
}
