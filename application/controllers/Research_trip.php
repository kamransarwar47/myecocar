<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Research_trip extends CI_Controller
{

    /**
     * Page research trip
     */
    public function index()
    {
        $data['total_records']  = 0;
        $data['search_records'] = [];
        if (isset($_GET['dc'])) {
            $search_query                      = [];
            $search_query['datepickerFrom >='] = date('Y-m-d');
            if (isset($_GET['dc']) && $_GET['dc'] != '') {
                $search_query['origin_city']    = $this->input->get('sdcty');
                $search_query['origin_country'] = $this->input->get('sdcnt');
            }
            if (isset($_GET['ac']) && $_GET['ac'] != '') {
                $search_query['dest_city']    = $this->input->get('sacty');
                $search_query['dest_country'] = $this->input->get('sacnt');
            }
            if (isset($_GET['dt']) && $_GET['dt'] != '') {
                $search_query['datepickerFrom'] = date('Y-m-d', strtotime($this->input->get('dt')));
            }
            // user must b active
            $this->db->join('users', 'users.user_id = route.user_id', 'LEFT');
            $search_query['user_status']      = 1;
            $search_query['is_route_end']     = 0;
            $search_query['route_status !=']  = 'Cancel';
			
			/* drive can not see there own Trips
			if(isset($_SESSION['User_LoginId'])){
				$search_query['route.user_id !='] = $_SESSION['User_LoginId'];
			}*/
            $search_data = $this->common_model->get('route', $search_query);

            $data['total_records']  = $search_data->num_rows();
            $data['search_records'] = $search_data->result_array();
        }
        $data['header_link_active'] = 'search_route';
        $data['title']              = _l('search_page_title');
        $data['content']            = $this->load->view('page-recherche-trajet', $data, true);
        $this->load->view('templates/template', $data);
    }

    public function trip_details()
    {
        $this->form_validation->set_rules('places_booked', 'Siège de livre', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['search_data']        = $this->common_model->get('route', ['route_id' => $this->input->get('id')])->row_array();
            $data['user_details']       = $this->common_model->get('users', ['user_id' => $data['search_data']['user_id']])->row_array();
            $data['header_link_active'] = 'search_route';
            $data['title']              = _l('trip_detail_page_title');
            $data['route_id']           = $this->input->get('id');
            $data['content']            = $this->load->view('page-trip-details', $data, true);
            $this->load->view('templates/template', $data);
        } else {
            $data['route_id']         = $this->input->get('id');
            $data['user_id']          = $this->session->userdata('User_LoginId');
            $data['places_booked']    = $this->input->post('places_booked');
            $data['booking_datetime'] = date("Y-m-d H:i:s", time());
            $data['total_amount']     = ($this->input->post('amount_per_seat') * $this->input->post('places_booked'));
            $id                       = $this->common_model->insert('bookings', $data);

            //send email
            $user_id       = $this->session->userdata('User_LoginId');
            $res_user_info = $this->db->get('users', ['user_id' => $user_id]);
            if ($res_user_info->num_rows() > 0) {
                $res_user_info = $res_user_info->row_array();
                $email         = $res_user_info['email'];
                $name          = $res_user_info['first_name'];
                if ($email) {

                    // route To From
                    $this->db->join('users', 'users.user_id = route.user_id', 'LEFT');
                    $search_data = $this->common_model->get('route', ['route_id' => $this->input->get('id')]);

                    if ($search_data->num_rows() > 0) {
                        $search_data = $search_data->row_array();
                        $arrgs       = [
                            'to' => $email,
                            'subject' => 'Myecocar Reservation of Seat',
                            'txt' => 'Hi ' . $name . ',<br>' . 'You have successfully reserved your seat against booking Number ' . $id . ' From ' . $search_data['dest_city'] . ', ' . $search_data['dest_country'] . ' To ' . $search_data['origin_city'] . ', ' . $search_data['origin_country'] . ' Data & Time of Travelling: ' . date('d-m-Y', strtotime($search_data['datepickerFrom'])) . ' ' . $search_data['depart_time_input'],
                        ];
                        send_email($arrgs);

                        // send email to driver
                        $arrgs = [
                            'to' => $search_data['email'],
                            'subject' => 'Myecocar Reservation of Seat',
                            'txt' => 'Hi ' . $search_data['first_name'] . ',<br>' . $name . ' has book your seat against your trip From ' . $search_data['dest_city'] . ', ' . $search_data['dest_country'] . ' To ' . $search_data['origin_city'] . ', ' . $search_data['origin_country'] . ' Data & Time of Travelling: ' . date('d-m-Y', strtotime($search_data['datepickerFrom'])) . ' ' . $search_data['depart_time_input'] . '</br>' . 'Please Confirm there status by login your Dashboard </br> Passenger Info </br>Name: ' . $res_user_info['first_name'] . ' ' . $res_user_info['second_name'] . '</br>Mobile: ' . $res_user_info['mobile'] . '</br>Email: ' . $email . '</br>Thankyour for your time and consideration',
                        ];
                        send_email($arrgs);

                    }
                }
            }
            set_message('You Have Accepted Offer & Reservation email has been send to your registered email address Successfully please check', 'success');
            redirect('research_trip/trip_details?id=' . $this->input->get('id'));
        }
    }
}
