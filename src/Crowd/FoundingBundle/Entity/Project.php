<?php

namespace Crowd\FoundingBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Crowd\FoundingBundle\Entity\Repository\ProjectRepository")
 * @ORM\Table(name="Project")
 * @ORM\HasLifecycleCallbacks
 */

class Project
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $name;

    /**
     * @ORM\Column(type="string")
     */
    protected $description;

    /**
     * @ORM\Column(type="string")
     */
    protected $summary;

    /**
     * @ORM\Column(type="integer")
     */
    protected $neededSum;

    /**
     * @ORM\Column(type="integer")
     */
    protected $currentSum;

    /**
     * @ORM\Column(type="integer")
     */
    protected $minDonate;

    /**
     * @ORM\Column(type="string")
     */
    protected $pathVideo;

    /**
     * @ORM\Column(type="string")
     */
    protected $pathMainPhoto;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $createdDate;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $endDate;

    /**
     * @ORM\Column(type="string")
     */
    protected $slug;

    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="project")
     */
    protected $comments;

    /**
     * @ORM\OneToMany(targetEntity="News", mappedBy="project")
     */
    protected $news;

    /**
     * @ORM\OneToMany(targetEntity="Photos", mappedBy="project")
     */
    protected $photos;

    /**
     * @ORM\OneToMany(targetEntity="Benefits", mappedBy="project")
     */
    protected $benefits;

    /**
     * @ORM\OneToMany(targetEntity="Donate", mappedBy="project")
     */
    protected $donates;

    /**
     * @ORM\OneToMany(targetEntity="UsersInProject", mappedBy="project")
     */
    protected $users;


    public function __construct()
    {
        $this->comments = new ArrayCollection();
        $this->news = new ArrayCollection();
        $this->photos = new ArrayCollection();
        $this->benefits = new ArrayCollection();
        $this->donates = new ArrayCollection();
        $this->users = new ArrayCollection();

        $this->setMinDonate(1);
        $this->setCurrentSum(0);
        $this->setCreatedDate(new \DateTime());
        $this->setEndDate(new \DateTime());
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

        $this->setSlug($this->name);
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
    public function getNeededSum()
    {
        return $this->neededSum;
    }

    /**
     * @param mixed $neededSum
     */
    public function setNeededSum($neededSum)
    {
        $this->neededSum = $neededSum;
    }

    /**
     * @return mixed
     */
    public function getCurrentSum()
    {
        return $this->currentSum;
    }

    /**
     * @param mixed $currentSum
     */
    public function setCurrentSum($currentSum)
    {
        $this->currentSum = $currentSum;
    }

    /**
     * @return mixed
     */
    public function getMinDonate()
    {
        return $this->minDonate;
    }

    /**
     * @param mixed $minDonate
     */
    public function setMinDonate($minDonate)
    {
        $this->minDonate = $minDonate;
    }

    /**
     * @return mixed
     */
    public function getPathVideo()
    {
        return $this->pathVideo;
    }

    /**
     * @param mixed $pathVideo
     */
    public function setPathVideo($pathVideo)
    {
        $this->pathVideo = $pathVideo;
    }

    /**
     * @return mixed
     */
    public function getPathMainPhoto()
    {
        return $this->pathMainPhoto;
    }

    /**
     * @param mixed $pathMainPhoto
     */
    public function setPathMainPhoto($pathMainPhoto)
    {
        $this->pathMainPhoto = $pathMainPhoto;
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
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param mixed $endDate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param mixed $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $this->slugify($slug);
    }

    /**
     * Add comment
     *
     * @param \Crowd\FoundingBundle\Entity\Comment $comment
     *
     * @return project
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
     * @return \Crowd\FoundingBundle\Entity\Comments $comments[]
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
     * @return project
     */
    public function addNews(\Crowd\FoundingBundle\Entity\News $news)
    {
        $this->news[] = $news;

        return $this;
    }

    /**
     * @return \Crowd\FoundingBundle\Entity\News $news[]
     */
    public function getNews()
    {
        return $this->news;
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
     * Add benefit
     *
     * @param \Crowd\FoundingBundle\Entity\Benefits $benefit
     *
     * @return project
     */
    public function addBenefit(\Crowd\FoundingBundle\Entity\Benefits $benefit)
    {
        $this->benefits[] = $benefit;

        return $this;
    }

    /**
     * Remove photo
     *
     * @param \Crowd\FoundingBundle\Entity\Benefits $benefit
     */
    public function removeBenefit(\Crowd\FoundingBundle\Entity\Benefits $benefit)
    {
        $this->benefits->removeElement($benefit);
    }

    /**
     * @return \Crowd\FoundingBundle\Entity\Benefits benefits[]
     */
    public function getBenefits()
    {
        return $this->benefits;
    }

    /**
     * Add donate
     *
     * @param \Crowd\FoundingBundle\Entity\Donate $donate
     *
     * @return project
     */
    public function addDonate(\Crowd\FoundingBundle\Entity\Donate $donate)
    {
        $this->donates[] = $donate;

        return $this;
    }

    /**
     * @return \Crowd\FoundingBundle\Entity\Donate donates[]
     */
    public function getDonates()
    {
        return $this->donates;
    }

    /**
     * Add User
     *
     * @param \Crowd\FoundingBundle\Entity\User $user
     *
     * @return project
     */
    public function addUser(\Crowd\FoundingBundle\Entity\User $user)
    {
        $this->users[] = $user;
    }
    /**
     * @return \Crowd\FoundingBundle\Entity\User $users[]
     */
    public function getUsers()
    {
        return $this->users;
    }

    public function transliterate($input)
    {
        $gost = array(
            'Є'=>'YE','І'=>'I','Ѓ'=>'G','і'=>'i','№'=>'','є'=>'ye','ѓ'=>'g',
            'А'=>'A','Б'=>'B','В'=>'V','Г'=>'G','Д'=>'D',
            'Е'=>'E','Ё'=>'YO','Ж'=>'ZH',
            'З'=>'Z','И'=>'I','Й'=>'J','К'=>'K','Л'=>'L',
            'М'=>'M','Н'=>'N','О'=>'O','П'=>'P','Р'=>'R',
            'С'=>'S','Т'=>'T','У'=>'U','Ф'=>'F','Х'=>'X',
            'Ц'=>'C','Ч'=>'CH','Ш'=>'SH','Щ'=>'SH','Ъ'=>'',
            'Ы'=>'Y','Ь'=>'','Э'=>'E','Ю'=>'YU','Я'=>'YA',
            'а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d',
            'е'=>'e','ё'=>'yo','ж'=>'zh',
            'з'=>'z','и'=>'i','й'=>'j','к'=>'k','л'=>'l',
            'м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r',
            'с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'x',
            'ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'sh','ъ'=>'',
            'ы'=>'y','ь'=>'','э'=>'e','ю'=>'yu','я'=>'ya',
            ':'=>'', '\'' => '', '#'=>'','['=>'', ']'=>'',
            '{'=>'', '}'=>'', '\\'=>'', '+'=>'-'
        );

        return strtr($input, $gost);
    }


    public function slugify($text)
    {
        $text = $this->transliterate($text);
        // trim
        $text = trim($text, '-');

        // transliterate
        if (function_exists('iconv'))
        {
            $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        }

        // lowercase
        $text = strtolower($text);

        // remove unwanted characters
        $text = preg_replace('#[^-\w]+#', '', $text);

        if (empty($text))
        {
            return 'n-a';
        }

        return $text;
    }


    /**
     * Set summary
     *
     * @param string $summary
     * @return Project
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * Get summary
     *
     * @return string 
     */
    public function getSummary()
    {
        return $this->summary;
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
     * Remove users
     *
     * @param \Crowd\FoundingBundle\Entity\UsersInProject $users
     */
    public function removeUser(\Crowd\FoundingBundle\Entity\UsersInProject $users)
    {
        $this->users->removeElement($users);
    }
}
