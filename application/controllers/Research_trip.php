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

}
