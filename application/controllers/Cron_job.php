<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron_job extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }
	
	public function send_reminder_to_driver(){
		
		$this->db->where('user_status', 1);
		$this->db->join('route', 'route.user_id = users.user_id', 'LEFT');
		$this->db->join('bookings', 'bookings.route_id = route.route_id', 'LEFT');
		$result = $this->db->get('users');
		
		if($result->num_rows() > 0){
			$user_details = $result->result_array();
			//sch_flex
			pre($user_details);
		}
      
		
	}
	
}