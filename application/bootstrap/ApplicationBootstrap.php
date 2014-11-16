<?php
use Doctrine\ORM\EntityManager;
require_once "ApplicationDefaultData.php";

class ApplicationBootstrap {
    public static function createSchema() {

    }

    public static function updateSchema() {

    }

    public static function dropSchema() {

    }

    public static function createDefaultData(EntityManager $em) {
        $defaultData = new ApplicationDefaultData();
        $defaultData->createDefaultData($em);
    }
}