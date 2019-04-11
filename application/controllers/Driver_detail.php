<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Driver_detail extends CI_Controller
{
    /**
     * Page driver details
     */
    public function index($id)
    {
        $data['header_link_active'] = 'search_route';
        $data['title']              = _l('driver_page_title');
        $data['user_details']       = $this->common_model->get('users', ['user_id' => $id])->row_array();
        $data['content']            = $this->load->view('driver_details', $data, true);
        $this->load->view('templates/template', $data);
    }
}
