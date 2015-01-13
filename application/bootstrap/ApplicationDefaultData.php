<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use Doctrine\ORM\EntityManager;
use entity\AppUser,
    entity\Role,
    entity\UserRole,
    entity\Action,
    entity\RoleAction;

class ApplicationDefaultData {

    private $em;

    public function create_default_data(EntityManager $em) {
        $this->em = $em;
        $this->create_user();
        $this->create_role();
        $this->create_user_role();
        $this->create_action();
        $this->createRoleAction();
        $em->flush();
    }

    private function create_user () {
        //id = 1
        $user = new AppUser(array('full_name'=>'Mamun Sardar', 'username'=>'mamun','password'=>'1234','email'=>'a@b.c'));
        $this->em->persist($user);
        //id = 2
        $user = new AppUser(array('full_name'=>'Administrator', 'username'=>'admin','password'=>'1234','email'=>'a@b.c'));
        $this->em->persist($user);
    }

    private function create_role() {
        $roleAdmin = new Role(array('name'=>'DEVELOPMENT', 'is_reserved'=> TRUE));
        $this->em->persist($roleAdmin);

        $roleUser = new Role(array('name'=>'ADMIN', 'is_reserved'=> TRUE));
        $this->em->persist($roleUser);
    }

    private function create_user_role() {
        $userRole = new UserRole(array('user_id'=> 1, 'role_id'=> ROLE::$ROLE_DEVELOPMENT, 'is_reserved'=>TRUE));
        $this->em->persist($userRole);
        $userRole = new UserRole(array('user_id'=> 1, 'role_id'=> ROLE::$ROLE_ADMIN, 'is_reserved'=>TRUE));
        $this->em->persist($userRole);
        $userRole = new UserRole(array('user_id'=> 2, 'role_id'=> ROLE::$ROLE_ADMIN, 'is_reserved'=>TRUE));
        $this->em->persist($userRole);
    }

    private function create_action() {
        //id = 1
        $action = new Action(array('controller_name'=>'login', 'action_name'=>'index', 'description'=>'Show login page', 'allow_get'=>TRUE, 'allow_post'=>FALSE, 'is_anonymous'=>TRUE));
        $this->em->persist($action);
        //id = 2
        $action = new Action(array('controller_name'=>'login', 'action_name'=>'check_login', 'description'=>'Check user login', 'allow_get'=>FALSE, 'allow_post'=>TRUE, 'is_anonymous'=>TRUE));
        $this->em->persist($action);
        //id = 3
        $action = new Action(array('controller_name'=>'login', 'action_name'=>'logout', 'description'=>'Logout user', 'allow_get'=>TRUE, 'allow_post'=>FALSE, 'is_anonymous'=>TRUE));
        $this->em->persist($action);
        //id = 4
        $action = new Action(array('controller_name'=>'login', 'action_name'=>'lock_app', 'description'=>'Lock application', 'allow_get'=>TRUE, 'allow_post'=>FALSE, 'is_anonymous'=>TRUE));
        $this->em->persist($action);
        //id = 5
        $action = new Action(array('controller_name'=>'home', 'action_name'=>'dashboard', 'description'=>'Show dashboard page', 'allow_get'=>FALSE, 'allow_post'=>TRUE, 'is_anonymous'=>FALSE));
        $this->em->persist($action);
    }

    private function createRoleAction() {
        $roleAction = new RoleAction(array('action_id'=>5, 'role_id'=>Role::$ROLE_ADMIN, 'is_reserved'=>TRUE));
        $this->em->persist($roleAction);
        $roleAction = new RoleAction(array('action_id'=>5, 'role_id'=>Role::$ROLE_DEVELOPMENT, 'is_reserved'=>TRUE));
        $this->em->persist($roleAction);
    }
}