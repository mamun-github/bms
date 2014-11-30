<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'Auth/ActionData.php';
require_once 'Auth/SessionData.php';
require_once 'Auth/UserActionRoleData.php';

class Auth {

    private $sessionObj;
    private $actionObj;
    private $userActionObj;


    /**
     * check login info valid or not, add user to session
     * @param $username
     * @param $password
     * @return bool
     */
    public function try_login($username, $password) {
        $ci =& get_instance();
        $this->sessionObj = new SessionData();
        $password = hash_password($password);
        $query = "SELECT * FROM app_user WHERE username = ? AND password = ? LIMIT 1";
        $queryResult = $ci->db->query($query, array($username, $password));
        $result = $queryResult->result_array();
        if(sizeof($result) > 0) {
            $this->sessionObj->add_app_user($result[0]);
            return TRUE;
        }
        return FALSE;
    }

    public function logout() {

    }

    public function is_logged_in() {

    }

    public function get_user_id() {

    }

    public function get_user() {

    }


    public function check_access($controller, $action) {
        $this->sessionObj = new SessionData();
        $this->actionObj = new ActionData();
        $this->userActionObj = new UserActionRoleData();

        $hasAccess = false;

        $action = $this->actionObj->get_action_by_controller_and_action($controller, $action);
        if($action == null) {
            return $hasAccess; //action not found, so no access
        }

        $allowGet = parse_boolean($action['allow_get']);
        $allowPost = parse_boolean($action['allow_post']);
        $isAnonymous = parse_boolean($action['is_anonymous']);

        /*if(!$allowPost && $_SERVER['REQUEST_METHOD'] === 'POST') {
            return $hasAccess;  //no access
        }
        elseif(!$allowGet && $_SERVER['REQUEST_METHOD'] === 'GET') {
            return $hasAccess;  //no access
        }*/

        if($isAnonymous) {
            $hasAccess = TRUE;
            return $hasAccess;  //action is anonymous, so access granted
        } else {
            //now check if user is logged in
            $isLoggedIn = $this->sessionObj->is_logged_in();
            if(!$isLoggedIn) {
                return $hasAccess;  //no access for not logged in user
            }
            //now check if user has really access to this action
            $appUserId = $this->sessionObj->get_user_id();
            $actionId = $action['id'];
            $hasAccessToAction = $this->userActionObj->checkUserAccessToAction($appUserId, $actionId);
            $hasAccess = $hasAccessToAction;
        }
        return $hasAccess;
    }
}