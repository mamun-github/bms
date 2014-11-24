<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SessionData {
    private $ci;
    function __construct() {
        $this->ci =& get_instance();  //to access the session
    }

    public function isLoggedIn() {
        $appUserId = $this->ci->session->userdata('appUserId');
        if(!$appUserId) {
            return FALSE;
        }
        return TRUE;
    }

    public function getLoggedInUserId() {
        $appUserId = $this->ci->session->userdata('appUserId');
        if(!$appUserId) {
            return 0;
        }
        return $appUserId;
    }

    public function addAppUser($appUser) {

    }
}