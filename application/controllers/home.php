<?php


class Home extends MY_Controller {

    public function index() {
        $this->load->view('home');
    }

    public function demo() {
        sleep(3); // sleep for 3 seconds (*to see the loading spinner)
        $this->load->view('demo/demo');
    }

    public function demo2() {
        sleep(3); // sleep for 3 seconds (*to see the loading spinner)
        $this->load->view('demo2/demo');
    }
}