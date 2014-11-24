<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ActionData {

    private $actionList = array();
    private $ci;

    function __construct() {
        $this->ci =& get_instance();
        $this->actionList = $this->loadActionData();
    }

    public function getActionByControllerAndAction($controller, $action) {
        if(empty($this->actionList)) return null;
        $actionObj = null;
        foreach($this->actionList as $singleAction) {
            if(($singleAction['controllerName'] == $controller) && ($singleAction['actionName'] == $action)) {
                $actionObj = $singleAction;
                break;
            }
        }
        return $actionObj;
    }

    private function loadActionData() {
        if ( ! $cache_data = $this->ci->cache->file->get('actionList'))
        {
            $listOfActions = array();

            $query = $this->ci->db->get('action');
            $results = $query->result_array();
            foreach($results as $result) {
                $listOfActions[$result['id']] = $result;
            }

            $this->ci->cache->file->save('actionList', $listOfActions, FILE_CACHE_EXP_TIME);
            $cache_data = $listOfActions;
        }
        return $cache_data;
    }
}