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
        echo $lang_output;
    } else {
        echo $lang;
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