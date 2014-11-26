<?php

class Login_check_login extends MY_Model {

    public function __construct() {
        parent::__construct();
    }

    private $USERNAME_PASSWORD_EMPTY = "Username or password cannot be empty";
    private $LOGIN_FAILED = "Failed to check login";
    private $USERNAME = "username";
    private $PASSWORD = "password";


    public function execute() {
        $result = $this->pre($this->result);
        $error = $result[ERROR];
        if($error) return $result;
        $result = $this->main($result);


        return $result;
    }

    public function pre($result) {
        try{
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $username = trim($username);
            $password = trim($password);
            if((strlen($username) <=0) || (strlen($password) <=0)) {
                return $this->set_error($result, $this->USERNAME_PASSWORD_EMPTY);
            }
            $result[$this->USERNAME] = $username;
            $result[$this->PASSWORD] = $password;
            return $result;
        } catch(Exception $ex) {
            log_error($ex);
            return $this->set_error($result, $this->LOGIN_FAILED);
        }
    }

    public function main($result) {
        try{
            $username = $result[$this->USERNAME];
            $password = $result[$this->PASSWORD];
            $success = $this->auth->try_login($username, $password);

            return $result;
        } catch(Exception $ex) {
            log_error($ex);
            return $this->set_error($result, $this->LOGIN_FAILED);
        }
    }

    public function post($result) {

    }

    public function success($result) {

    }

    public function failure($result) {

    }

}