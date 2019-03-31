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
            $search_query = [];
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

            $search_data            = $this->common_model->get('route', $search_query);
            $data['total_records']  = $search_data->num_rows();
            $data['search_records'] = $search_data->result_array();
        }
        $data['header_link_active'] = 'search_route';
        $data['title']              = 'Search';
        $data['content']            = $this->load->view('page-recherche-trajet', $data, true);
        $this->load->view('templates/template', $data);
    }

    public function trip_details()
    {
        $this->form_validation->set_rules('places_booked', 'Siège de livre', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['search_data']        = $this->common_model->get('route', ['route_id' => $this->input->get('id')])->row_array();
            $data['header_link_active'] = 'search_route';
            $data['title']              = 'Trip Details';
            $data['route_id']           = $this->input->get('id');
            $data['content']            = $this->load->view('page-trip-details', $data, true);
            $this->load->view('templates/template', $data);
        } else {
            $data['route_id']         = $this->input->get('id');
            $data['user_id']          = $this->session->userdata('User_LoginId');
            $data['places_booked']    = $this->input->post('places_booked');
            $data['booking_datetime'] = date("Y-m-d H:i:s", time());
            $data['total_amount']     = ($this->input->post('amount_per_seat') * $this->input->post('places_booked'));
            $this->common_model->insert('bookings', $data);

            set_message('You Have Accepted Offer Successfully', 'success');
            redirect('research_trip/trip_details?id=' . $this->input->get('id'));
        }
    }
}
