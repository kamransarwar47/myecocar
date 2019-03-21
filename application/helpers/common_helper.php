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
function _l($lang){
	$CI = &get_instance();
	$lang_output =  $CI->lang->line($lang);
	if($lang_output){
		echo $lang_output;
	}else{
		echo $lang;
	}
}

/**
* user login check
*/
function is_user_login(){
	$CI = &get_instance();
	$id = $CI->session->userdata('User_LoginId');
	if(empty($id)){
		redirect(base_url());
	}
}