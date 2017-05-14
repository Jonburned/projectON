<?php

namespace Crowd\FoundingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Comment")
 * @ORM\HasLifecycleCallbacks
 */

class Comment
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $createdDate;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="comments")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @ORM\ManyToOne(targetEntity="Project", inversedBy="comments")
     * @ORM\JoinColumn(name="project_id", referencedColumnName="id")
     */
    protected $project;

    public function __construct()
    {
        $this->setCreatedDate(new \DateTime);
    }

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
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * @param mixed $createdDate
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
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
