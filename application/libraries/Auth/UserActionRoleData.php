<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use entity\UserActionRoleView;

class UserActionRoleData {

    private $userActionRoleList = array();
    private $ci;

    function __construct() {
        $this->ci =& get_instance();
        $this->userActionRoleList = $this->loadUserActionRoleData();
    }

    public function checkUserAccessToAction($appUserId, $actionId) {
        $result = $this->userActionRoleList[$appUserId];
        $actionList = explode(',', $result['action_ids']);
        if(in_array($actionId, $actionList)) {
            return TRUE;
        }
        return FALSE;
    }

    public function getActionList($userId) {

    }

    public function getAllRoles($userId) {

    }

    public function loadUserActionRoleData() {
        if ( ! $cache_data = $this->ci->cache->file->get('userActionRoleList'))
        {
            $listOfUserActionRole = array();
            //here goes your codes...
            $query = $this->ci->db->query(UserActionRoleView::$query);
            $results = $query->result_array();
            foreach($results as $result) {
                $listOfUserActionRole[$result['user_id']] = $result;
            }

            $this->ci->cache->file->save('userActionRoleList', $listOfUserActionRole, FILE_CACHE_EXP_TIME);
            $cache_data = $listOfUserActionRole;
        }
        return $cache_data;
    }
}