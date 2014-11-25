<?php

interface Action_Model_Interface{

    public function execute();

    public  function pre($result);

    public function main($result);

    public function post($result);

    public function success($result);

    public function failure($result);
}