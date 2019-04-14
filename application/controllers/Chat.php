<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller
{
    /**
     * chat page
     */

    function __construct()
    {
        parent::__construct();
        is_user_login();
        $this->load->model('Chat_model');
    }

    public function index($user_type, $route_id)
    {
        $data['header_link_active'] = 'search_route';
        $data['title']              = _l('chat_page_title');
        $data['chat_user']          = $this->common_model->get('users', ['user_id' => $_SESSION['User_LoginId']], 'user_id, current_session, chat_online')->row_array();
        $data['route_detail']       = $this->common_model->get('route', ['route_id' => $route_id], 'origin_city, dest_city, datepickerFrom, depart_time_input')->row_array();
        // contact users
        $data['contactUsers']   = $this->Chat_model->chatUsers($user_type, $route_id);
        $data['currentSession'] = 0;
        $data['user_type']      = $user_type;
        $data['route_id']       = $route_id;
        $data['content']        = $this->load->view('chat_page', $data, true);
        $this->load->view('templates/template', $data);
    }

    public function update_user_list()
    {
        $chatUsers = $this->Chat_model->chatUsers($this->input->post('user_type'), $this->input->post('route_id'));
        $data      = array(
            "profileHTML" => $chatUsers,
        );
        echo json_encode($data);
    }

    public function insert_chat()
    {
        $this->Chat_model->insertChat($this->input->post('to_user_id'), $_SESSION['User_LoginId'], $this->input->post('chat_message'), $this->input->post('route_id'));
    }

    public function show_chat()
    {
        $this->Chat_model->showUserChat($_SESSION['User_LoginId'], $this->input->post('to_user_id'), $this->input->post('route_id'));
    }

    public function update_user_chat()
    {
        $conversation = $this->Chat_model->getUserChat($_SESSION['User_LoginId'], $this->input->post('to_user_id'), $this->input->post('route_id'));
        $data         = array(
            "conversation" => $conversation
        );
        echo json_encode($data);
    }

    public function update_unread_message()
    {
        $count = $this->Chat_model->getUnreadMessageCount($this->input->post('to_user_id'), $_SESSION['User_LoginId'], $this->input->post('route_id'));
        $data  = array(
            "count" => $count
        );
        echo json_encode($data);
    }
}
