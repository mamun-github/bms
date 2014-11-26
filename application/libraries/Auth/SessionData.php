<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SessionData {
    private $ci;
    function __construct() {
        $this->ci =& get_instance();  //to access the session
    }

    public function isLoggedIn() {
        $appUserId = $this->ci->session->userdata('app_user_id');
        if(!$appUserId) {
            return FALSE;
        }
        return TRUE;
    }

    public function get_user_id() {
        $appUserId = $this->ci->session->userdata('app_user_d');
        if(!$appUserId) {
            return 0;
        }
        return $appUserId;
    }

    public function get_user() {
        $appUserId = $this->ci->session->userdata('app_user');
        if(!$appUserId) {
            return 0;
        }
        return $appUserId;
    }

    public function add_app_user($appUser) {
        $this->ci->session->set_userdata('app_user_d', $appUser[ID]);
        $this->ci->session->set_userdata('app_user', $appUser);
    }
}