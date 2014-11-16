<?php

require_once APPPATH . "/bootstrap/ApplicationBootstrap.php";

class bootstrap extends MY_Controller {

    public function index() {
        echo "Nothing here";
    }

    public function create_schema() {

    }

    public function update_schema() {

    }

    public function drop_schema() {

    }

    public function create_default_data() {
        ApplicationBootstrap::createDefaultData($this->em);
    }
}