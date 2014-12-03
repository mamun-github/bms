<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SessionData {
    private $ci;
    function __construct() {
        $this->ci =& get_instance();  //to access the session
    }

    public function is_logged_in() {
        $appUserId = $this->ci->session->userdata('app_user_id');
        if(!$appUserId) {
            return FALSE;
        }
        return TRUE;
    }

    public function get_user_id() {
        $appUserId = $this->ci->session->userdata('app_user_id');
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
        $this->ci->session->set_userdata('app_user_id', $appUser[ID]);
        $this->ci->session->set_userdata('app_user', $appUser);
    }

    public function logout_user() {
        $this->ci->session->sess_destroy();
    }

    public function is_locked_app() {
        $isLocked = $this->ci->session->userdata('is_locked_app');
        return $isLocked;
    }

    public function lock_application() {
        $this->ci->session->set_userdata('is_locked_app', TRUE);
    }

    public function unlock_application() {
        $this->ci->session->unset_userdata('is_locked_app');
    }
}