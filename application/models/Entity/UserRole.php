<?php

namespace Entity;

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

}