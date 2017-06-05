<?php

namespace Crowd\FoundingBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Crowd\FoundingBundle\Entity\Repository\UserRepository")
 * @ORM\Table(name="User")
 * @ORM\HasLifecycleCallbacks
 */

class User
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $surname;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $regDate;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $description;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $userPhoto;

    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="user")
     */
    protected $comments;

    /**
     * @ORM\OneToMany(targetEntity="News", mappedBy="user")
     */
    protected $news;

    /**
     * @ORM\OneToMany(targetEntity="Donate", mappedBy="user")
     */
    protected $donates;

    /**
     * @ORM\OneToMany(targetEntity="UsersInProject", mappedBy="user")
     */
    protected $projects;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
        $this->news = new ArrayCollection();
        $this->donates = new ArrayCollection();
        $this->projects = new ArrayCollection();

        $this->setRegDate(new \DateTime());
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * @return mixed
     */
    public function getRegDate()
    {
        return $this->regDate;
    }

    /**
     * @param mixed $regDate
     */
    public function setRegDate($regDate)
    {
        $this->regDate = $regDate;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getUserPhoto()
    {
        return $this->userPhoto;
    }

    /**
     * @param mixed $userPhoto
     */
    public function setUserPhoto($userPhoto)
    {
        $this->userPhoto = $userPhoto;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Add comment
     *
     * @param \Crowd\FoundingBundle\Entity\Comment $comment
     *
     * @return user
     */
    public function addComment(\Crowd\FoundingBundle\Entity\Comment $comment)
    {
        $this->comments[] = $comment;

        return $this;
    }

    /**
     * Remove comment
     *
     * @param \Crowd\FoundingBundle\Entity\Comment $comment
     */
    public function removeComment(\Crowd\FoundingBundle\Entity\Comment $comment)
    {
        $this->comments->removeElement($comment);
    }

    /**
     * @return mixed
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Add news
     *
     * @param \Crowd\FoundingBundle\Entity\News $news
     *
     * @return user
     */
    public function addNews(\Crowd\FoundingBundle\Entity\News $news)
    {
        $this->news[] = $news;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNews()
    {
        return $this->news;
    }

    /**
     * Add donate
     *
     * @param \Crowd\FoundingBundle\Entity\Donate $donate
     *
     * @return user
     */
    public function addDonate(\Crowd\FoundingBundle\Entity\Donate $donate)
    {
        $this->donates[] = $donate;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDonates()
    {
        return $this->donates;
    }

    /**
     * Add donate
     *
     * @param \Crowd\FoundingBundle\Entity\Project $project
     *
     * @return user
     */
    public function addProject(\Crowd\FoundingBundle\Entity\Project $project)
    {
        $this->projects[] = $project;

        return $this;
    }

    /**
     * @return \Crowd\FoundingBundle\Entity\Project $projects[]
     */
    public function getProjects()
    {
        return $this->projects;
    }




    /**
     * Remove news
     *
     * @param \Crowd\FoundingBundle\Entity\News $news
     */
    public function removeNews(\Crowd\FoundingBundle\Entity\News $news)
    {
        $this->news->removeElement($news);
    }

    /**
     * Remove donates
     *
     * @param \Crowd\FoundingBundle\Entity\Donate $donates
     */
    public function removeDonate(\Crowd\FoundingBundle\Entity\Donate $donates)
    {
        $this->donates->removeElement($donates);
    }

    /**
     * Remove projects
     *
     * @param \Crowd\FoundingBundle\Entity\UsersInProject $projects
     */
    public function removeProject(\Crowd\FoundingBundle\Entity\UsersInProject $projects)
    {
        $this->projects->removeElement($projects);
    }
}
