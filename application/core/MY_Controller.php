<?php

class MY_Controller extends CI_Controller{
    // Doctrine EntityManager
    public $em;

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('doctrine');
        $this->load->library('auth');

        //assign entity manager
        $this->em = $this->doctrine->em;
    }
}