<?php

require_once APPPATH . "/bootstrap/ApplicationBootstrap.php";

class bootstrap extends MY_Controller {

    public function index() {
        echo "Application Bootstrap Service";
    }

    public function create_schema() {
        ApplicationBootstrap::create_schema();
    }

    public function update_schema() {
        ApplicationBootstrap::update_schema();
    }

    public function drop_schema() {
        ApplicationBootstrap::drop_schema();
    }

    public function create_default_data() {
        ApplicationBootstrap::create_default_data($this->em);
    }
}