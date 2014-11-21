<?php

use Authentication\SessionData;

class Authentication {


    public function authenticate($obj) {
        //echo $obj->router->class;
        //echo $obj->router->method;

        $hasAccess = $this->checkAccess();
    }


    public function logout($obj) {

    }

    private function checkAccess() {

    }
}