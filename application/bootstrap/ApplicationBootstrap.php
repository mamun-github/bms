<?php
use Doctrine\ORM\EntityManager;
require_once "ApplicationDefaultData.php";

class ApplicationBootstrap {

    /**
     * this function creates schema using DoctrineCommander.php
     * will fail if schema already exists
     * this function should be called when the Database is empty
     * @return bool
     */
    public static function createSchema() {
        $successString = "Database schema created successfully!";
        $createSchemaCmd = "orm:schema-tool:create";
        $command = "php ". APPPATH . "DoctrineCommander.php ". $createSchemaCmd;
        exec($command, $output);
        if(in_array($successString, $output)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * this function will forcefully update schema
     * @return int
     * 0 - failed to update
     * 1 - if successfully update
     * 2 - if database is already updated
     */
    public static function updateSchema() {
        $successString = "updated successfully";
        $upToDateString = "Nothing to update";
        $forceUpdateSchemaCmd = "orm:schema-tool:update --force";
        $command = "php " . APPPATH . "DoctrineCommander.php " . $forceUpdateSchemaCmd;
        exec($command, $output);
        foreach ($output as $element) {
            if (strpos($element, $successString)) {
                return 1;
            } elseif (strpos($element, $upToDateString)) {
                return 2;
            }
        }
        return 0;
    }

    /**
     * this function drops all tables from database
     * @return bool
     */
    public static function dropSchema() {
        $successString = "Database schema dropped successfully!";
        $dropSchemaCmd = "orm:schema-tool:drop --force";
        $command = "php ". APPPATH . "DoctrineCommander.php ". $dropSchemaCmd;
        exec($command, $output);
        if(in_array($successString, $output)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * create default data to run application
     * @param EntityManager $em
     */
    public static function createDefaultData(EntityManager $em) {
        $defaultData = new ApplicationDefaultData();
        $defaultData->createDefaultData($em);
    }



    private static function execWithTimeout($cmd, $timeout=5) {
        $descriptorspec = array(
            0 => array("pipe", "r"),
            1 => array("pipe", "w"),
            2 => array("pipe", "w")
        );
        $pipes = array();

        $timeout += time();
        $process = proc_open($cmd, $descriptorspec, $pipes);
        if (!is_resource($process)) {
            throw new Exception("proc_open failed on: " . $cmd);
        }

        $output = '';

        do {
            $timeleft = $timeout - time();
            $read = array($pipes[1]);
            stream_select($read, $write = NULL, $exeptions = NULL, $timeleft, NULL);

            if (!empty($read)) {
                $output .= fread($pipes[1], 8192);
            }
        } while (!feof($pipes[1]) && $timeleft > 0);

        if ($timeleft <= 0) {
            proc_terminate($process);
            throw new Exception("command timeout on: " . $cmd);
        } else {
            return $output;
        }
    }
}