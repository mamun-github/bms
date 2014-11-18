<?php
use Doctrine\ORM\EntityManager;
use Entity\User;

class ApplicationDefaultData {

    public function create_default_data(EntityManager $em) {
        $this->create_user($em);

        $em->flush();
    }

    private function create_user (EntityManager $em) {
        $userData = array();

        $userData["fullName"] = "Mamun Sardar"; $userData["username"] = "mamun"; $userData["password"] = "1234";
        $user = new User($userData);
        $em->persist($user);

        $userData["fullName"] = "Administrator"; $userData["username"] = "admin"; $userData["password"] = "1010";
        $user = new User($userData);
        $em->persist($user);
    }
}