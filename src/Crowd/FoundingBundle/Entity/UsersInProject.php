<?php

namespace Crowd\FoundingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="Crowd\FoundingBundle\Entity\Repository\UsersInProjectRepository")
 * @ORM\Table(name="UsersInProjects")
 */

class UsersInProject
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $role;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="projects")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @ORM\ManyToOne(targetEntity="Project", inversedBy="users")
     * @ORM\JoinColumn(name="project_id", referencedColumnName="id")
     */
    protected $project;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @return \Crowd\FoundingBundle\Entity\User $user
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param \Crowd\FoundingBundle\Entity\User $user
     */
    public function setUser(\Crowd\FoundingBundle\Entity\User $user = null)
    {
        $this->user = $user;
    }

    /**
     * @return \Crowd\FoundingBundle\Entity\Project $project
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * @param \Crowd\FoundingBundle\Entity\Project $project
     */
    public function setProject(\Crowd\FoundingBundle\Entity\Project $project = null)
    {
        $this->project = $project;
    }



}
