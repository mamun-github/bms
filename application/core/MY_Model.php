<?php

class MY_Model extends CI_Model {

    // Doctrine EntityManager
    public $em;

    public function __construct() {
        parent::__construct();

        //assign entity manager
        $this->em = $this->doctrine->em;
    }
}