<?php
use Doctrine\ORM\EntityManager;
use entity\User,
    entity\Role,
    entity\UserRole,
    entity\Action,
    entity\RoleAction;

class ApplicationDefaultData {

    public function create_default_data(EntityManager $em) {
        $this->createUser($em);
        $this->createRole($em);
        $this->createUserRole($em);
        $this->createAction($em);
        $this->createRoleAction($em);
        $em->flush();
    }

    private function createUser (EntityManager $em) {
        $userData = array();

        $userData["fullName"] = "Administrator"; $userData["username"] = "admin"; $userData["password"] = "1010";
        $user = new User($userData);
        $em->persist($user);

        $userData["fullName"] = "Mamun Sardar"; $userData["username"] = "mamun"; $userData["password"] = "1234";
        $user = new User($userData);
        $em->persist($user);

    }

    private function createRole(EntityManager $em) {
        $roleAdmin = new Role(array('name'=>'Admin', 'isReserved'=> TRUE));
        $em->persist($roleAdmin);

        $roleUser = new Role(array('name'=>'User', 'isReserved'=> TRUE));
        $em->persist($roleUser);
    }

    private function createUserRole(EntityManager $em) {
        $userRole = new UserRole(array('userId'=> 1, 'roleId'=> 1));
        $em->persist($userRole);
        $userRole = new UserRole(array('userId'=> 1, 'roleId'=> 2));
        $em->persist($userRole);
        $userRole = new UserRole(array('userId'=> 2, 'roleId'=> 2));
        $em->persist($userRole);
    }

    private function createAction(EntityManager $em) {
        $action = new Action(array('controllerName'=>'login', 'actionName'=>'index', 'description'=>'Show login page', 'allowGet'=>TRUE, 'allowPost'=>TRUE, 'isAnonymous'=>TRUE));
        $em->persist($action);
    }

    private function createRoleAction(EntityManager $em) {
        //$roleAction = new RoleAction(array('roleId'=>1, 'actionId'=>1, 'isReserved'=>TRUE));
    }
}