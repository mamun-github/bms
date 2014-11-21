<?php

use Netcarver\Textile;

class Login extends MY_Controller {

    public function index() {
        $this->load->view('login');
    }
}