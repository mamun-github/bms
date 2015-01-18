<?php

class Home extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    public function favorite() {
        sleep(3);
        $this->load_view("home/favorite/view");
    }

    public function dashboard() {
        sleep(3); // sleep for 3 seconds (to see the loading spinner)
        $this->load_view('home/dashboard/view');
    }

}