<?php

class MY_Controller extends CI_Controller{
    // Doctrine EntityManager
    public $em;

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('doctrine');
        $this->load->library('authentication');

        //authenticate request
        $this->authentication->authenticate($this);

        //assign entity manager
        $this->em = $this->doctrine->em;
    }

    public function logout() {

    }
}