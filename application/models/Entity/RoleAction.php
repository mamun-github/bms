<?php

namespace Entity;

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
}