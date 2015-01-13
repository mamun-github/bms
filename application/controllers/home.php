<?php

class Home extends MY_Controller {

    public function dashboard() {
        sleep(3); // sleep for 3 seconds (to see the loading spinner)
        $this->load_view('dashboard/view');
    }

}