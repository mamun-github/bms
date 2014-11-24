<?php

class MY_Controller extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->driver('cache');
        $this->load->library('auth');
    }
}