<?php

use Netcarver\Textile;

class Login extends MY_Controller {

    public function index() {
        $this->load->view('login');
    }

    public function check_login() {
        $this->load->model('action_model/login/login_check_login');
        $result = $this->login_check_login->execute();
        $error = $result['error'];
        if($error) {
            //show login page again with some data
        } else {
            //redirect to home
        }
    }
}