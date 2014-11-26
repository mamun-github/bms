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
    private $controller_name;

    /**
     * @Column(type="string", length=50, nullable=false)
     */
    private $action_name;

    /**
     * @Column(type="string", length=50, nullable=false)
     */
    private $description;

    /**
     * @Column(type="boolean", nullable=false)
     */
    private $allow_get;

    /**
     * @Column(type="boolean", nullable=false)
     */
    private $allow_post;

    /**
     * @Column(type="boolean", nullable=false)
     */
    private $is_anonymous;

    public function __construct($args) {
        $this->controller_name = $args['controller_name'];
        $this->action_name = $args['action_name'];
        $this->description = $args['description'];
        $this->allow_get = $args['allow_get'];
        $this->allow_post = $args['allow_post'];
        $this->is_anonymous = $args['is_anonymous'];
    }
}