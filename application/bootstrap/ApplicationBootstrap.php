<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once "ApplicationDefaultData.php";

class ApplicationBootstrap {

    /**
     * this function creates schema
     * will fail if schema already exists
     * this function should be called when the Database is empty
     * @return bool
     */
    public static function create_schema($ci) {
        if(!file_exists(PHP_PATH)) {
            die("PHP executable path error !!! Please configure constants in application/config.");
        }
        $successString = "Database schema created successfully!";
        $createSchemaCmd = "orm:schema-tool:create";
        $command = PHP_PATH . " ". APPPATH . "DoctrineTool.php ". $createSchemaCmd;
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
    public static function update_schema() {
        if(!file_exists(PHP_PATH)) {
            die("PHP executable path error !!! Please configure constants in application/config.");
        }
        $successString = "updated successfully";
        $upToDateString = "Nothing to update";
        $forceUpdateSchemaCmd = "orm:schema-tool:update --force";
        $command = PHP_PATH . " ". APPPATH . "DoctrineTool.php " . $forceUpdateSchemaCmd;
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
    public static function drop_schema() {
        if(!file_exists(PHP_PATH)) {
            die("PHP executable path error !!! Please configure constants in application/config.");
        }
        $successString = "Database schema dropped successfully!";
        $dropSchemaCmd = "orm:schema-tool:drop --force";
        $command = PHP_PATH . " ". APPPATH . "DoctrineTool.php ". $dropSchemaCmd;
        exec($command, $output);
        if(in_array($successString, $output)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * create default data to run application
     */
    public static function create_default_data() {
        $defaultData = new ApplicationDefaultData();
        $ci =& get_instance();
        $ci->load->library('doctrine');
        $defaultData->create_default_data($ci->doctrine->em);
    }

}