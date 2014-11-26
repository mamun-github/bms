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
    private $role_id;

    /**
     * @Id
     * @Column(type="integer", nullable=false)
     */
    private $action_id;

    /**
     * @Column(type="boolean", nullable=false)
     */
    private $is_reserved;

    public function __construct($args) {
        $this->role_id = $args['role_id'];
        $this->action_id = $args['action_id'];
        $this->is_reserved = $args['is_reserved'];
    }
}