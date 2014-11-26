<?php
namespace entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="app_session", indexes={@Index(name="last_activity_idx", columns={"last_activity"})})
 */
class AppSession {

    /**
     * @Id
     * @Column(type="string", length=40, nullable=false, options={"default" = 0})
     */
    private $session_id;


    /**
     * @Column(type="string", length=45, nullable=false, options={"default" = 0})
     */
    private $ip_address;

    /**
     * @Column(type="string", length=120, nullable=false)
     */
    private $user_agent;

    /**
     * @Column(columnDefinition="integer(10) unsigned default 0 NOT NULL")
     */
    private $last_activity;

    /**
     * @Column(type="text", nullable=false)
     */
    private $user_data;
}