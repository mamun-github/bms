<?php

namespace entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="action")
 */
class Action {

    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Column(type="string", length=50, nullable=false)
     */
    private $controllerName;

    /**
     * @Column(type="string", length=50, nullable=false)
     */
    private $actionName;

    /**
     * @Column(type="string", length=50, nullable=false)
     */
    private $description;

    /**
     * @Column(type="boolean", nullable=false)
     */
    private $allowGet;

    /**
     * @Column(type="boolean", nullable=false)
     */
    private $allowPost;

    /**
     * @Column(type="boolean", nullable=false)
     */
    private $isAnonymous;

    public function __construct($args) {
        $this->controllerName = $args['controllerName'];
        $this->actionName = $args['actionName'];
        $this->description = $args['description'];
        $this->allowGet = $args['allowGet'];
        $this->allowPost = $args['allowPost'];
        $this->isAnonymous = $args['isAnonymous'];
    }
}