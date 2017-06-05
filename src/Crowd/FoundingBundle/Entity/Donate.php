<?php

namespace Crowd\FoundingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="Crowd\FoundingBundle\Entity\Repository\DonateRepository")
 * @ORM\Table(name="Donate")
 * @ORM\HasLifecycleCallbacks
 */

class Donate
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
    protected $date;

    /**
     * @ORM\Column(type="integer")
     */
    protected $sum;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $anonymous;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $hideSum;

    /**
     * @ORM\ManyToOne(targetEntity="Project", inversedBy="donates")
     * @ORM\JoinColumn(name="project_id", referencedColumnName="id")
     */
    protected $project;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="donates")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    public function __construct()
    {
        $this->setDate(new \DateTime());
        $this->setAnonymous(false);
        $this->setHideSum(false);
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
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getSum()
    {
        return $this->sum;
    }

    /**
     * @param mixed $sum
     */
    public function setSum($sum)
    {
        $this->sum = $sum;
    }

    /**
     * @return mixed
     */
    public function getAnonymous()
    {
        return $this->anonymous;
    }

    /**
     * @param mixed $anonymous
     */
    public function setAnonymous($anonymous)
    {
        $this->anonymous = $anonymous;
    }

    /**
     * @return mixed
     */
    public function getHideSum()
    {
        return $this->hideSum;
    }

    /**
     * @param mixed $hideSum
     */
    public function setHideSum($hideSum)
    {
        $this->hideSum = $hideSum;
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



}
