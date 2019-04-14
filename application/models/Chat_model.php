<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Class Chat Model
 */
class Chat_model extends CI_Model
{
    private $chatTable = 'chat';
    private $chatUsersTable = 'users';

    /**
     * Chat constructor.
     */
    function __construct()
    {
        parent::__construct();
    }

    private function getData($sqlQuery)
    {
        $result = $this->db->query($sqlQuery);
        if (!$result) {
            die('Error in query: ' . $this->db->error());
        }
        $data = array();
        if ($result->num_rows() > 0) {
            $data = $result->result_array();
        }
        return $data;
    }

    public function chatUsers($user_type, $route_id)
    {
        if ($user_type == 'user') {
            $driver_id = get_driver_id_by_route_id($route_id);
            $sqlQuery  = "SELECT * FROM " . $this->chatUsersTable . " 
			WHERE user_id = '$driver_id'";
            return $this->getData($sqlQuery);
        } else if ($user_type == 'driver') {
            // user who message on this route
            $this->db->select("DISTINCT(sender_userid) AS sender_id");
            $this->db->where(['chat_route_id' => $route_id, 'reciever_userid' => $_SESSION['User_LoginId']]);
            $msg_route = $this->db->get('chat')->result_array();
            // booking users
            $this->db->select("DISTINCT(user_id) AS sender_id");
            $this->db->where(['route_id' => $route_id]);
            $booking_route = $this->db->get('bookings')->result_array();
            $users         = array_unique(array_merge($msg_route, $booking_route), SORT_REGULAR);
            $users         = array_map('current', $users);
            // get users
            $data = array();
            if (!empty($users)) {
                $this->db->select('*');
                $this->db->where_in('user_id', $users);
                $result = $this->db->get($this->chatUsersTable);
                if ($result->num_rows() > 0) {
                    $data = $result->result_array();
                }
            }
            return $data;
        }
    }

    public function getUserDetails($userid)
    {
        $sqlQuery = "SELECT * FROM " . $this->chatUsersTable . " 
			WHERE user_id = '$userid'";
        return $this->getData($sqlQuery);
    }

    public function insertChat($reciever_userid, $user_id, $chat_message, $route_id)
    {
        $sqlInsert = "INSERT INTO " . $this->chatTable . " 
			(reciever_userid, sender_userid, message, status, chat_route_id) 
			VALUES ('" . $reciever_userid . "', '" . $user_id . "', '" . $chat_message . "', '1', '" . $route_id . "')";
        $result    = $this->db->query($sqlInsert);
        if (!$result) {
            return ('Error in query: ' . mysqli_error());
        } else {
            $conversation = $this->getUserChat($user_id, $reciever_userid);
            $data         = array(
                "conversation" => $conversation
            );
            echo json_encode($data);
        }
    }

    public function getUserChat($from_user_id, $to_user_id, $route_id)
    {
        $sqlQuery     = "SELECT * FROM " . $this->chatTable . " 
			WHERE (sender_userid = '" . $from_user_id . "' 
			AND reciever_userid = '" . $to_user_id . "' AND chat_route_id = '" . $route_id . "') 
			OR (sender_userid = '" . $to_user_id . "' 
			AND reciever_userid = '" . $from_user_id . "' AND chat_route_id = '" . $route_id . "')
			ORDER BY timestamp ASC";
        $userChat     = $this->getData($sqlQuery);
        $conversation = '<ul>';
        foreach ($userChat as $chat) {
            $user_name = '';
            if ($chat["sender_userid"] == $from_user_id) {
                $conversation .= '<li class="sent">';
                $conversation .= '<img width="22px" height="22px" src="' . base_url('assets/uploads/' . userimage_by_id($from_user_id)) . '" alt="" />';
            } else {
                $conversation .= '<li class="replies">';
                $conversation .= '<img width="22px" height="22px" src="' . base_url('assets/uploads/' . userimage_by_id($to_user_id)) . '" alt="" />';
            }
            $conversation .= '<p>' . $chat["message"] . '</p>';
            $conversation .= '</li>';
        }
        $conversation .= '</ul>';
        return $conversation;
    }

    public function showUserChat($from_user_id, $to_user_id, $route_id)
    {
        $userSection = '<img src="' . base_url('assets/uploads/' . userimage_by_id($to_user_id)) . '" alt="" />
				<p>' . username_by_id($to_user_id) . '</p>';
        // get user conversation
        $conversation = $this->getUserChat($from_user_id, $to_user_id, $route_id);
        // update chat user read status
        $sqlUpdate = "UPDATE " . $this->chatTable . " 
			SET status = '0' 
			WHERE sender_userid = '" . $to_user_id . "' AND reciever_userid = '" . $from_user_id . "' AND chat_route_id = '" . $route_id . "' AND status = '1'";
        $this->db->query($sqlUpdate);
        // update users current chat session
        $sqlUserUpdate = "UPDATE " . $this->chatUsersTable . " 
			SET current_session = '" . $to_user_id . "' 
			WHERE user_id = '" . $from_user_id . "'";
        $this->db->query($sqlUserUpdate);
        $data = array(
            "userSection" => $userSection,
            "conversation" => $conversation
        );
        echo json_encode($data);
    }

    public function getUnreadMessageCount($senderUserid, $recieverUserid, $route_id)
    {
        $sqlQuery = "SELECT * FROM " . $this->chatTable . "  
			WHERE sender_userid = '$senderUserid' AND reciever_userid = '$recieverUserid' AND chat_route_id = '$route_id' AND status = '1'";
        $numRows  = $this->db->query($sqlQuery)->num_rows();
        $output   = '';
        if ($numRows > 0) {
            $output = $numRows;
        }
        return $output;
    }
}