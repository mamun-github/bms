<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserActionData {

    private static $userActionList = array();


    public function checkUserAccessToAction($appUserId, $actionId) {
        $actionList = self::$userActionList[$appUserId];
        if(in_array($actionId, $actionList)) {
            return TRUE;
        }
        return FALSE;
    }

}