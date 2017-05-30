<?php

namespace Crowd\FoundingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Benefits")
 */

class Benefits
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
    protected $name;

    /**
     * @ORM\Column(type="integer")
     */
    protected $minSum;

    /**
     * @ORM\Column(type="string")
     */
    protected $description;

    /**
     * @ORM\ManyToOne(targetEntity="Project", inversedBy="benefits")
     * @ORM\JoinColumn(name="project_id", referencedColumnName="id")
     */
    protected $project;

    /**
     * @ORM\OneToMany(targetEntity="Photos", mappedBy="benefits")
     */
    protected $photos;

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
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param mixed $path
     */
    public function setPath($path)
    {
        $this->path = $path;
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
     * Add photo
     *
     * @param \Crowd\FoundingBundle\Entity\Photos $photo
     *
     * @return project
     */
    public function addPhoto(\Crowd\FoundingBundle\Entity\Photos $photo)
    {
        $this->photos[] = $photo;

        return $this;
    }

    /**
     * Remove photo
     *
     * @param \Crowd\FoundingBundle\Entity\Photos $photo
     */
    public function removePhoto(\Crowd\FoundingBundle\Entity\Photos $photo)
    {
        $this->photos->removeElement($photo);
    }

    /**
     * @return \Crowd\FoundingBundle\Entity\Photos photos[]
     */
    public function getPhotos()
    {
        return $this->photos;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->photos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Benefits
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set minSum
     *
     * @param integer $minSum
     * @return Benefits
     */
    public function setMinSum($minSum)
    {
        $this->minSum = $minSum;

        return $this;
    }

    /**
     * Get minSum
     *
     * @return integer 
     */
    public function getMinSum()
    {
        return $this->minSum;
    }
}
