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
		if($this->input->post('verification_code') != ''){
			$this->form_validation->set_rules('verification_code', 'Mobile Verified Code', 'trim|required');
		}
        
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
			$this->db->order_by('route_id', 'desc');
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
			
			//For new number verification must
			$result = $this->common_model->get('users', ['user_id' => $this->session->userdata('User_LoginId')], 'mobile, email');
			 if ($result->num_rows() > 0) {
				$res = $result->row();
				$mobile_no 	= $res->mobile;
				$email 		= $res->email;
				if($email != $data['email']){
					$data['is_verified'] = 0;
				}
				if($mobile_no != $data['mobile']){
					if($this->session->userdata('verification_code') != $this->input->post('verification_code')){
						set_message('Your Verification code is not correct', 'warning');
						redirect('user_profile');
					}else if($data['mobile'] != $this->session->userdata('verification_mobile_number')){
						set_message('Your New mobile number need to be verified', 'warning');
						redirect('user_profile');
					}
				}
			}
			
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
	
	// delete trip
    public function delete_trip()
    {
        if ($this->input->is_ajax_request()) {
            $result = $this->common_model->delete('route', ['route_id' => $this->input->post('trip_id')]);
            if ($result) {
                echo 'TRUE';
            } else {
                echo 'FALSE';
            }
        } else {
            exit('No direct script access allowed');
        }
    }
	
	//verifying email address
	public function verifying_email(){
		
		 if ($this->input->is_ajax_request()) {
			 
			$email = $this->input->post('email');
			$user_id = $this->input->post('user_id');
			$name = $this->input->post('name');
		
			if($user_id != '' && $email != ''){
				$verification_Code	= md5(md5(time()));
				//send email
				if($email != ''){	
					$arrgs = [
						'to' => $email,
						'subject' => 'Myecocar Registeration Email Verification',
						'txt' => 'Hi '.$name.',<br>'.'You have successfully registered to Myecocar please verify your email address by clicking on the link below<br><a href="'.base_url("registration/verifying_email?code=".$verification_Code.'&u_id='.$user_id).'">Click Here</a>'
					];
					$res = send_email($arrgs);
					
					if($res){
						$token_update['email_token'] = $verification_Code;
						$this->common_model->update('users', $token_update, ['user_id' => $user_id]);
						echo true;
					}
				}
			}
			echo false;
		 } else {
            exit('No direct script access allowed');
        }
		
	}
	
	//uploads an user image
	function img_upload_user_profile(){

		$config['upload_path']          = './assets/uploads/';
		$config['allowed_types']        = 'gif|jpg|png';
		$result = file_upload_admin('user_profile_img', $config);
		//echo $result; die();
		if(!isset($result['file_name']) && $result['file_name'] != ''){
			set_message('The Image You Have choose is bad formated only use .gif, .jpg, .png ', 'warning');
			redirect('user_profile');
		}
		//unset img
		$img_res = $this->common_model->get('users', ['user_id' => $this->session->userdata('User_LoginId')], 'user_profile_img');
		if($img_res->num_rows() > 0 && $img_res->row()->user_profile_img != ''){
			$user_image_name = $img_res->row()->user_profile_img;
			unlink_files(['assets/uploads/'.$user_image_name]);
		}
		$image_name = $result['file_name'];
		$this->common_model->update('users', ['user_profile_img' => $image_name], ['user_id' => $this->session->userdata('User_LoginId')]);
		redirect('user_profile');
	}
	
	//Account delete
	function delete_account(){	
		$del_token = '';
		$user_id = $this->input->get('u_id');
		$get_res = $this->common_model->get('users', ['user_id' => $user_id], 'del_token');
		if($get_res->num_rows() > 0){
			$get_res = $get_res->row();	
			$del_token = $get_res->del_token;		
		}
		if($del_token != '' && $this->input->get('del_code') != '' && $del_token == $this->input->get('del_code')){		
		$this->db->trans_start();
		
			$this->db->where('user_id', $user_id);
			$this->db->delete('users');
			
			$this->db->where('user_id', $user_id);
			$this->db->delete('route');
			
			$this->db->where('user_id', $user_id);
			$this->db->delete('bookings');
			
			if($this->db->trans_complete()){
				$this->session->unset_userdata('User_LoginId');
				$this->session->unset_userdata('User_UserName');
				set_heading_message('Your Account has been successfully Deleted');
			}else{
				set_heading_message('There is some problem');
			}
		}else{
			set_heading_message('Sorry you can not delete your profile please try again');
		}
	}
	
	//Account delete email send
	function delete_account_email(){
		 if ($this->input->is_ajax_request()) {
			 if($this->input->post('delete_account_val') == 'SUPPRIMER' || $this->input->post('delete_account_val') == 'DELETE' ){
				$secrete_del_code = md5(md5(time()));
				$user_id = $this->session->userdata('User_LoginId');
				$email = '';
				$get_res = $this->common_model->get('users', ['user_id' => $user_id], 'email, first_name');
				if($get_res->num_rows() > 0){
					$get_res = $get_res->row();	
					$email = $get_res->email;	
					$name = $get_res->first_name;	
				}
				//send email
				if($email != ''){	
					$arrgs = [
						'to' => $email,
						'subject' => 'Myecocar Registeration Email Verification',
						'txt' => 'Hi '.$name.',<br>'.'You can delete your Myecocar profile completly by clicking on the link below<br><a href="'.base_url("user_profile/delete_account?del_code=".$secrete_del_code.'&u_id='.$user_id).'">Click Here</a>'
					];
					$res = send_email($arrgs);
					
					if($res){
						$token_update['del_token'] = $secrete_del_code;
						$this->common_model->update('users', $token_update, ['user_id' => $user_id]);
						echo json_encode(['action' => 'success', 'msg' => 'Email Has been send to you please verify that this is you. then you can delete your profile']);
					}
				}
				
			}else{
				echo json_encode(['action' => 'info', 'msg' => 'Please Write DELETE OR SUPPRIMER To Delete Your Complete Profile in Capital words']);
			}
		 }
	}	
	
	//Account Deactivate
	function deactivate_account(){
		if ($this->input->is_ajax_request()) {

			if($this->input->post('deactivate_account_val') == 'DESACTIVER' || $this->input->post('deactivate_account_val') == 'DISABLE'){
				$user_id = $this->session->userdata('User_LoginId');
				$user_status['user_status'] = 0;
				$this->common_model->update('users', $user_status, ['user_id' => $user_id]);
				 $this->session->unset_userdata('User_LoginId');
				$this->session->unset_userdata('User_UserName');
				echo json_encode(['action' => 'success', 'msg' => 'You have successfully Deactivate your profile till you can not login']);
			}else{
				echo json_encode(['action' => 'info', 'msg' => 'Please Write DESACTIVER OR DISABLE To Disable Your Profile in Capital words']);
			}
		 }
	}
}
