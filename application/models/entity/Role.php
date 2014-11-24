<?php

namespace entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="role")
 */
class Role {

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
    private $isReserved;

    public function __construct($args) {
        $this->name = $args['name'];
        $this->isReserved = $args['isReserved'];
    }

}