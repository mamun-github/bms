<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH . "/bootstrap/ApplicationBootstrap.php";

class BootstrapSchemaHooks {

    /**
     * create schema on hooks bootstrap call
     */
    public function create_schema() {
        ApplicationBootstrap::create_schema();
    }
}