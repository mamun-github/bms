<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH . "/bootstrap/ApplicationBootstrap.php";

class BootstrapHooks {

    /**
     * create schema on hooks bootstrap call
     */
    public function create_schema() {
        ApplicationBootstrap::create_schema($this);
    }

    /**
     * create default data on hooks bootstrap call
     */
    public function create_default_data() {
        ApplicationBootstrap::create_default_data();
    }

}