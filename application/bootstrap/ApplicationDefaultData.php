<?php
use Doctrine\ORM\EntityManager;
use Entity\User;

class ApplicationDefaultData {

    public function createDefaultData(EntityManager $em) {
        $this->createUser($em);

        $em->flush();
    }

    private function createUser (EntityManager $em) {
        $userData = array();

        $userData["fullName"] = "Mamun Sardar"; $userData["username"] = "mamun"; $userData["password"] = "1234";
        $user = new User($userData);
        $em->persist($user);

        $userData["fullName"] = "Administrator"; $userData["username"] = "admin"; $userData["password"] = "1010";
        $user = new User($userData);
        $em->persist($user);
    }
}