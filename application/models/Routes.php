<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Class Routes
 */
class Routes extends CI_Model
{
    /**
     * Routes constructor.
     */
    function __construct()
    {
        parent::__construct();
    }

    /**
	 * get the passengers which have applied for route trip
     */
    function get_route_passengers($route_id)
    { 
        $this->db->select('first_name, second_name, email, mobile, origin_city, origin_country, dest_city, dest_country, datepickerFrom, depart_time_input, (SELECT CONCAT(first_name, " ", second_name) FROM users WHERE user_id = route.user_id) AS driver_name, (SELECT mobile FROM users WHERE user_id = route.user_id) AS driver_mobile, booking_id, booking_datetime, booking_status, amount_status, cancel_trip_reason');
        $this->db->where('route.route_id', $route_id);
        $this->db->join('bookings', 'bookings.route_id = route.route_id', 'LEFT');
        $this->db->join('users', 'bookings.user_id = users.user_id', 'LEFT');
        $result = $this->db->get('route');

        return $result;
    }
	
	// send message on mobile
	function send_mobile_message($mobile_number, $msg){

		if($mobile_number != '' && $msg != ''){
			$url="https://www.envoyersmspro.com/api/message/send";

			//the parameters to pass to the server in POST
			$myPostParams="text=".urlencode($msg)."&recipients=".$mobile_number."&sendername=Myecocar";
			 
			//Query configuration
			$requestConfig = array( 'http' => array(
									'method' => 'POST',
									'header'=>"Authorization: Basic ".base64_encode(ENVOYERSMSPRO_LOGIN.":".ENVOYERSMSPRO_PASSWORD)."\r\n"
									."Content-type: application/x-www-form-urlencoded\r\n",
									'content' => $myPostParams
									));
			 
			//Return of the server
			$response = file_get_contents($url, false, stream_context_create($requestConfig));
			if($response){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	
}