<?php

namespace entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="role_action")
 */
class RoleAction {

    /**
     * @Id
     * @Column(type="integer", nullable=false)
     */
    private $roleId;

    /**
     * @Id
     * @Column(type="integer", nullable=false)
     */
    private $actionId;

    /**
     * @Column(type="boolean", nullable=false)
     */
    private $isReserved;

    public function __construct($args) {
        $this->roleId = $args['roleId'];
        $this->actionId = $args['actionId'];
        $this->isReserved = $args['isReserved'];
    }
}