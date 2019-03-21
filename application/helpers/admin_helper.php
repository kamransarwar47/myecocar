<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 * @param $message
 * @param $status
 */
function set_message($message, $status)
{
    $CI =	&get_instance();
    $message = ['message' => $message,
        'status' => $status];
    $message = $CI->load->view('includes/message', $message, true);
    $CI->session->set_flashdata('message', $message);
}
/**
 * @param array $unlink
 * @return bool
 */
function unlink_files($unlink = []){
	if(count($unlink) > 0){
		foreach($unlink as $file){
			@unlink($file);
		}
	}
	return true;
}
/**
 * @param $field_name
 * @param $config
 * @return mixed
 */
function file_upload_admin($field_name, $config)
{
    $CI =	&get_instance();
    $CI->load->library('upload', $config);
    if (!$CI->upload->do_upload($field_name)) {
        $data = $CI->upload->display_errors();
    } else {
        $data = $CI->upload->data();
    }
    return $data;
}

/**
 * @param $data
 * @return string
 */
function resize_image($data)
{
    $CI =	&get_instance();
    $CI->load->library('image_lib');
    $config = ['image_library' => 'gd2',
        'source_image' => $data['source_path'],
        'new_image' => $data['target_path'],
        'maintain_ratio' => false,
        'width' => $data['width'],
        'height' => $data['height'],
        'quality' => 60];
    $CI->image_lib->initialize($config);
    if (!$CI->image_lib->resize()) {
        return $CI->image_lib->display_errors();
    }
    $CI->image_lib->clear();
    return '1';
}

/**
 * @param $status
 * @return string
 */
function get_status($status)
{
    if ($status == 1) {
        $return['text'] = 'Active';
        $return['status'] = 0;
        $return['color'] = 'purple';
    } else {
        $return['text'] = 'Inactive';
        $return['status'] = 1;
        $return['color'] = 'danger';
    }
    return $return;
}