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
    private $userId;

    /**
     * @Id
     * @Column(type="integer", nullable=false)
     */
    private $roleId;

    /**
     * @Column(type="boolean", nullable=false)
     */
    private $isReserved;

    public function __construct($args) {
        $this->userId = $args['userId'];
        $this->roleId = $args['roleId'];
        $this->isReserved = $args['isReserved'];
    }

}