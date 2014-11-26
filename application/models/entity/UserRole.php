<?php

namespace entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="user_role")
 */
class UserRole {

    /**
     * @Id
     * @Column(type="integer", nullable=false)
     */
    private $user_id;

    /**
     * @Id
     * @Column(type="integer", nullable=false)
     */
    private $role_id;

    /**
     * @Column(type="boolean", nullable=false)
     */
    private $is_reserved;

    public function __construct($args) {
        $this->user_id = $args['user_id'];
        $this->role_id = $args['role_id'];
        $this->is_reserved = $args['is_reserved'];
    }

}