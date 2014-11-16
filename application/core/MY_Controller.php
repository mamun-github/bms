<?php

class MY_Controller extends CI_Controller{
    // Doctrine EntityManager
    public $em;

    function __construct()
    {
        parent::__construct();
        $this->load->library('doctrine');
        $this->em = $this->doctrine->em;
    }
}