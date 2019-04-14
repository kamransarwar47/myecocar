<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Propose_route extends CI_Controller
{

    /**
     * Page Propose Route
     */
    public function index($edit = false, $id = 0)
    {
        $this->form_validation->set_rules('origin_input', _l('post_ad_field1'), 'trim|required');
        $this->form_validation->set_rules('destination_input', _l('post_ad_field2'), 'trim|required');
        $this->form_validation->set_rules('datepickerFrom', _l('post_ad_dept_date'), 'trim|required');
        $this->form_validation->set_rules('depart_time_input', _l('post_ad_dept_time'), 'trim|required');
        if ($this->input->post('round_trip_checkbox') == 'on') {
            $this->form_validation->set_rules('datepickerTo', _l('post_ad_arr_date'), 'trim|required');
            $this->form_validation->set_rules('arrival_time_input', _l('post_ad_arr_time'), 'trim|required');
        }
        $this->form_validation->set_rules('vehicle_model_make', _l('post_ad_veh_mkmdl'), 'trim|required');
        $this->form_validation->set_rules('fuel_type', _l('post_ad_fuel'), 'trim|required');
        $this->form_validation->set_rules('free_spaces', _l('post_ad_free_place'), 'trim|required');
        $this->form_validation->set_rules('baggages', _l('post_ad_baggage'), 'trim|required');
        $this->form_validation->set_rules('max_detour', _l('post_ad_max_detour'), 'trim|required');
        $this->form_validation->set_rules('sch_flex', _l('post_ad_sch_flex'), 'trim|required');
        $this->form_validation->set_rules('acceptance', _l('post_ad_acceptance'), 'trim|required');
        $this->form_validation->set_rules('travel_description', _l('post_ad_travel_desc'), 'trim|required');
        $this->form_validation->set_rules('travel_charges', _l('post_ad_price_field'), 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title']              = _l('post_ad_page_title');
            $data['header_link_active'] = 'propose_route';
            $data['edit']               = $edit;
            if ($edit != false && $id != 0) {
                // route details
                $route_data         = $this->common_model->get('route', ['route_id' => $id]);
                $data['route_data'] = $route_data->row_array();
            }
            $data['content'] = $this->load->view('page-propose-route', $data, true);
            $this->load->view('templates/template', $data);
        } else {
            $data['user_id']            = $this->session->userdata('User_LoginId');
            $data['origin_input']       = $this->input->post('origin_input');
            $data['origin_city']        = $this->input->post('origin_city');
            $data['origin_country']     = $this->input->post('origin_country');
            $data['destination_input']  = $this->input->post('destination_input');
            $data['dest_city']          = $this->input->post('dest_city');
            $data['dest_country']       = $this->input->post('dest_country');
            $data['datepickerFrom']     = date('Y-m-d', strtotime($this->input->post('datepickerFrom')));
            $data['depart_time_input']  = date('H:i:s', strtotime($this->input->post('depart_time_input')));
            $data['vehicle_model_make'] = $this->input->post('vehicle_model_make');
            $data['fuel_type']          = $this->input->post('fuel_type');
            $data['free_spaces']        = $this->input->post('free_spaces');
            $data['baggages']           = $this->input->post('baggages');
            $data['max_detour']         = $this->input->post('max_detour');
            $data['sch_flex']           = $this->input->post('sch_flex');
            $data['acceptance']         = $this->input->post('acceptance');
            $data['travel_description'] = $this->input->post('travel_description');
            $data['travel_charges']     = $this->input->post('travel_charges');
            $data['payment_method']     = $this->input->post('payment_method');
			$data['route_start_datetime'] 		   = date('Y-m-d H:i:s');
			
            if ($this->common_model->insert('route', $data) != false) {
                if (isset($_POST['edit_check']) && $_POST['edit_check'] == '1') {
                    $this->common_model->delete('route', ['route_id' => $_POST['edit_check_id']]);
                }
                // return tour details
                if (isset($_POST['round_trip_checkbox']) && $_POST['round_trip_checkbox'] == 'on') {
                    $data['origin_input']      = $this->input->post('destination_input');
                    $data['origin_city']       = $this->input->post('dest_city');
                    $data['origin_country']    = $this->input->post('dest_country');
                    $data['destination_input'] = $this->input->post('origin_input');
                    $data['dest_city']         = $this->input->post('origin_city');
                    $data['dest_country']      = $this->input->post('origin_country');
                    $data['datepickerFrom']    = date('Y-m-d', strtotime($this->input->post('datepickerTo')));
                    $data['depart_time_input'] = date('H:i:s', strtotime($this->input->post('arrival_time_input')));
					$data['route_start_datetime'] 		   = date('Y-m-d H:i:s');
					
                    $this->common_model->insert('route', $data);
                }
            }

            if (isset($_POST['edit_check']) && $_POST['edit_check'] == '1') {
                set_message(_l('route_update_msg'), 'success');
                redirect('user_profile');
            } else {
                set_message(_l('route_add_msg'), 'success');
                redirect('propose_route');
            }
        }
    }

  /**
	* Cancel the trip by driver 
	*/
	public function cancel_trip(){
		 if ($this->input->is_ajax_request()) {
			if($this->input->post('cancel_trip_reason') != ''){
				$cancel_trip['cancel_trip_reason'] = $this->input->post('cancel_trip_reason');
				$cancel_trip['route_status'] = 'Cancel';
				
				$result = $this->common_model->update('route', $cancel_trip, ['route_id' => $this->input->post('route_id')]);
				if ($result) {
					//send mobile sms and email
					$this->load->model('routes');
					$res = $this->routes->get_route_passengers($this->input->post('route_id'));
					
					if($res){
						$details = $res->result_array();
						foreach($details as $row){
							$first_name = $row['first_name'];
							$second_name = $row['second_name'];
							$driver_mobile = $row['driver_mobile'];
							$email = $row['email'];
							$mobile = $row['mobile'];
							$origin_city = $row['origin_city'];
							$origin_country = $row['origin_country'];
							$dest_city = $row['dest_city'];
							$dest_country = $row['dest_country'];
							$rout_start_data = date('d-m-Y', strtotime($row['datepickerFrom']));
							$rout_start_time = date('H:i:s', strtotime($row['depart_time_input']));
							$driver_name = $row['driver_name'];
							$cancel_trip_reason = $row['cancel_trip_reason'];
							$booking_id = $row['booking_id'];
							$booking_datetime = $row['booking_datetime'];
							$booking_status = ucfirst($row['booking_status']);
							$amount_status = ucfirst($row['amount_status']);
							$message = "Hi $first_name,</br>Your trip of booking id $booking_id which has book From $origin_country, $origin_city TO $dest_country, $dest_city on Date & Time: $rout_start_data $rout_start_time has been cancelled by Driver: $driver_name</br>Your Trip Approval status <stromg>$booking_status</stromg></br>Your Trip Payment Status <stromg>$amount_status</stromg></br><stromg>Reason of Cancellation</strong>: $cancel_trip_reason.</br>Please Again Reserve your seats against available route in Myecocar</br>For Futher Confirmation please contact with Driver</br>Driver Mobile is Number: $driver_mobile";
							//send email
							if($email != ''){	
								$arrgs = [
									'to' => $email,
									'subject' => 'Myecocar Cancellation of Trip',
									'txt' => $message
								];
								send_email($arrgs);
								
							}
							 $this->routes->send_mobile_message($mobile, strip_tags($message));
						}
						
					}
					echo json_encode(['action' => 'success', 'msg' => 'You Have successfully Cancelled Your trip. Email and Mobile Message for cancellation of trip has been sended to your reserved passenger.']);
				} else {
					echo json_encode(['action' => 'warning', 'msg' => 'There is some problem']);
				}
			}else{
				echo json_encode(['action' => 'info', 'msg' => 'Please enter the reason for cancellation of trip']);
			}
        } else {
            exit('No direct script access allowed');
        }
	}
}
