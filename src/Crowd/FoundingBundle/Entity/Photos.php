<?php

namespace Crowd\FoundingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="Crowd\FoundingBundle\Entity\Repository\PhotosRepository")
 * @ORM\Table(name="Photos")
 */

class Photos
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
    protected $path;

    /**
     * @ORM\ManyToOne(targetEntity="Project", inversedBy="photos")
     * @ORM\JoinColumn(name="project_id", referencedColumnName="id")
     */
    protected $project;

    /**
     * @ORM\ManyToOne(targetEntity="Project", inversedBy="photos")
     * @ORM\JoinColumn(name="benefits_id", referencedColumnName="id")
     */
    protected $benefits;

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
     * @return \Crowd\FoundingBundle\Entity\Benefits $benefits
     */
    public function getBenefits()
    {
        return $this->benefits;
    }

    /**
     * @param \Crowd\FoundingBundle\Entity\Benefits $benefits
     */
    public function setBenefits(\Crowd\FoundingBundle\Entity\Benefits $benefits = null)
    {
        $this->benefits = $benefits;
    }



}
