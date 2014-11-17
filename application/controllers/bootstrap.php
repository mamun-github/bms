<?php

require_once APPPATH . "/bootstrap/ApplicationBootstrap.php";

class bootstrap extends MY_Controller {

    public function index() {
        echo "Application Bootstrap Service";
    }

    public function create_schema() {
        ApplicationBootstrap::createSchema();
    }

    public function update_schema() {
        ApplicationBootstrap::updateSchema();
    }

    public function drop_schema() {
        ApplicationBootstrap::dropSchema();
    }

    public function create_default_data() {
        ApplicationBootstrap::createDefaultData($this->em);
    }
}