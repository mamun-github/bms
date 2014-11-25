<?php

class MY_Model extends CI_Model {

    public $em;     // Doctrine EntityManager
    public $result; //result to use in action model

    public function __construct() {
        parent::__construct();
        $this->em = $this->doctrine->em;    //assign entity manager
        $this->result = array();        //initiating result array
        $this->result[ERROR] = FALSE;
    }

    /**
     * set error and return result
     * @param $result - array to set error
     * @param $message - message to set in result
     * @return array
     */
    public function set_error($result, $message) {
        $result[ERROR] = TRUE;
        $result[MESSAGE] = $message;
        return $result;
    }

    /**
     * set success and return result
     * @param $result - array to set success
     * @param $message - message to set in result
     * @return array
     */
    public function set_success($result, $message) {
        $result[ERROR] = FALSE;
        $result[MESSAGE] = $message;
        return $result;
    }
}