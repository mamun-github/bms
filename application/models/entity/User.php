<?php

namespace entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="app_user")
 */
class User {

    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Column(type="string", length=100, nullable=false)
     */
    private $fullName;

    /**
     * @Column(type="string", length=32, unique=true, nullable=false)
     */
    private $username;

    /**
     * @Column(type="string", length=64, nullable=false)
     */
    private $password;


    public function __construct($args) {
        $this->fullName = $args["fullName"];
        $this->username = $args["username"];
        $this->password = $this->hashPassword($args["password"]);
    }

    public function hashPassword($value) {
        $salt = '#*$e@U!rE*^';
        return md5($salt . $value);
    }

}