<?php

namespace entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="app_user")
 */
class AppUser {

    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Column(type="string", length=100, nullable=false)
     */
    private $full_name;

    /**
     * @Column(type="string", length=32, unique=true, nullable=false)
     */
    private $username;

    /**
     * @Column(type="string", length=64, nullable=false)
     */
    private $password;

    /**
     * @Column(type="string", length=100, nullable=false)
     */
    private $email;


    public function __construct($args) {
        $this->full_name = $args["full_name"];
        $this->username = $args["username"];
        $this->password = hash_password($args["password"]);
        $this->email = $args["email"];
    }

}