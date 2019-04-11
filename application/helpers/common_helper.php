<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 * @param     $array
 * @param int $die
 */
function pre($array, $die = 1)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
    if ($die == 1) {
        exit;
    }
}

/**
 * @param int $die
 */
function query($die = 1)
{
    $CI = &get_instance();
    echo $CI->db->last_query();
    if ($die == 1) {
        exit;
    }
}

/**
 * language file
 */
function _l($lang)
{
    $CI          = &get_instance();
    $lang_output = $CI->lang->line($lang);
    if ($lang_output) {
        return $lang_output;
    } else {
        return $lang;
    }
}

/**
 * user login check
 */
function is_user_login()
{
    $CI = &get_instance();
    $id = $CI->session->userdata('User_LoginId');
    if (empty($id)) {
        redirect(base_url());
    }
}

/**
 * get user name by id
 */
function username_by_id($id)
{
    $CI = &get_instance();
    $CI->db->select('first_name, second_name');
    $CI->db->where('user_id', $id);
    $result = $CI->db->get('users');
    $result = $result->row_array();
    return ucwords($result['first_name'] . ' ' . $result['second_name']);
}

/**
 * get user name by id
 */
function userimage_by_id($id)
{
    $CI = &get_instance();
    $CI->db->select('user_profile_img');
    $CI->db->where('user_id', $id);
    $result = $CI->db->get('users');
    $result = $result->row_array();
    if($result['user_profile_img'] != ''){
        return $result['user_profile_img'];
    } else {
        return 'no-image.jpg';
    }
}

/**
 * get remaining places by route id
 */
function remaining_places_by_route_id($id)
{
    $CI = &get_instance();
    $CI->db->select('route.free_spaces as spaces, SUM(bookings.places_booked) as total_booking');
    $CI->db->where('route.route_id', $id);
    $CI->db->join('bookings', 'route.route_id = bookings.route_id');
    $result = $CI->db->get('route')->row_array();
    return ($result['spaces'] - $result['total_booking']);
}

/**
 * get booking by route id
 */
function boooking_by_route_id($id)
{
    $CI = &get_instance();
    $CI->db->select('bookings.*, users.first_name as first_name, users.second_name as second_name, users.mobile as mobile, users.email as email');
    $CI->db->where('bookings.route_id', $id);
    $CI->db->join('users', 'bookings.user_id = users.user_id');
    $result = $CI->db->get('bookings');
    if ($result->num_rows() > 0) {
        return $result->result_array();
    } else {
        return [];
    }
}
	
/**
 * get booking by route id
 */
function send_email($arrgs = [], $form = 'contact@myecocar.org')
{	
	if(!empty($arrgs)){
		$to = $arrgs['to'];
		$subject =  $arrgs['subject'];
		$txt = $arrgs['txt'];
		
		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		
		// More headers
		$headers .=  "From: <".$form.">";

		$res = mail($to,$subject,$txt,$headers);
		if($res){
			return true;
		}
	}
	return false;
}

/**
 * @param $dob yyyy-mm-dd format
 */
function calc_age_from_dob($dob){
    $today = new DateTime();
    $birthdate = new DateTime($dob);
    $interval = $today->diff($birthdate);
    return $interval->format('%y');
}

function get_ads_post_by_user_id($id){
    $CI = &get_instance();
    $CI->db->select('COUNT(route_id) AS total_ads');
    $CI->db->where('user_id', $id);
    $result = $CI->db->get('route');
    $result = $result->row_array();
    return $result['total_ads'];
}