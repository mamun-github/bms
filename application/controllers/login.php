<?php

class Login extends MY_Controller {

    public function index() {
        $this->load_view('login');
    }

    public function check_login() {
        $result = $this->execute_result('login_check_login', 'action_model/login');
        $error = $result[ERROR];
        if($error) {
            //show login page again with some data
            die('login failed');
        } else {
            redirect('home');
        }
    }

    public function logout() {
        $this->auth->logout();
        $url = base_url();
        redirect($url);
    }

    public function lock_app() {
        $this->auth->lock_application();
        $this->load_view('lock_app');
    }
}