<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ActionData {

    private static $actionList = array();

    public function getActionByControllerAndAction($controller, $action) {
        $action = null;
        foreach(self::$actionList as $singleAction) {
            if(($singleAction['controllerName'] == $controller) && ($singleAction['actionName'] == $action)) {
                $action = $singleAction;
                break;
            }
        }
        return $action;
    }
}