<?php

namespace entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="role")
 */
class Role {

    public static $ROLE_DEVELOPMENT = 1;
    public static $ROLE_ADMIN = 2;


    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Column(type="string", length=50, nullable=false)
     */
    private $name;

    /**
     * @Column(type="boolean", nullable=false)
     */
    private $is_reserved;

    public function __construct($args) {
        $this->name = $args['name'];
        $this->is_reserved = $args['is_reserved'];
    }

}