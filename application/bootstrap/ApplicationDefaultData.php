<?php
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
        $userData["fullName"] = "Administrator"; $userData["username"] = "admin"; $userData["password"] = "1234";
        $user = new AppUser(array('full_name'=>'Administrator', 'username'=>'admin','password'=>'1234','email'=>'a@b.c'));
        $this->em->persist($user);

        $user = new AppUser(array('full_name'=>'Mamun Sardar', 'username'=>'mamun','password'=>'1234','email'=>'a@b.c'));
        $this->em->persist($user);

    }

    private function create_role() {
        $roleAdmin = new Role(array('name'=>'Admin', 'isReserved'=> TRUE));
        $this->em->persist($roleAdmin);

        $roleUser = new Role(array('name'=>'User', 'isReserved'=> TRUE));
        $this->em->persist($roleUser);
    }

    private function create_user_role() {
        $userRole = new UserRole(array('userId'=> 1, 'roleId'=> 1));
        $this->em->persist($userRole);
        $userRole = new UserRole(array('userId'=> 1, 'roleId'=> 2));
        $this->em->persist($userRole);
        $userRole = new UserRole(array('userId'=> 2, 'roleId'=> 2));
        $this->em->persist($userRole);
    }

    private function create_action() {
        $action = new Action(array('controllerName'=>'login', 'actionName'=>'index', 'description'=>'Show login page', 'allowGet'=>TRUE, 'allowPost'=>TRUE, 'isAnonymous'=>TRUE));
        $this->em->persist($action);
    }

    private function createRoleAction() {
        //$roleAction = new RoleAction(array('roleId'=>1, 'actionId'=>1, 'isReserved'=>TRUE));
    }
}