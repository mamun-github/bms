<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH . "/bootstrap/ApplicationBootstrap.php";

class BootstrapDefaultDataHooks {

    /**
     * create default data on hooks bootstrap call
     */
    public function create_default_data() {
        ApplicationBootstrap::create_default_data();
    }
}