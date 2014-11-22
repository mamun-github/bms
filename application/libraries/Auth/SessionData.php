<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SessionData {
    private static $appUserList = array();
    private $ci;

    function __construct() {
        $ci =& get_instance();  //to access the session
    }

    public function isLoggedIn() {
        $loggedIn = FALSE;
        $appUserId = $this->session->userdata('appUserId');
        if(!$appUserId) {
            return $loggedIn;   //session not found in codeigniter session
        }
        if(in_array($appUserId, self::$appUserList)) {
            $loggedIn = TRUE;
        }
        return $loggedIn;
    }

    public function getLoggedInUserId() {
        $loggedInUserId = 0;
        $appUserId = $this->session->userdata('appUserId');
        if(!$appUserId) {
            return $loggedInUserId;   //session not found in codeigniter session
        }
        if(in_array($appUserId, self::$appUserList)) {
            $loggedInUserId = $appUserId;
        }
        return $loggedInUserId;
    }
}