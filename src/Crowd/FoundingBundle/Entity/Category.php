<?php

namespace Crowd\FoundingBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Crowd\FoundingBundle\Entity\Repository\CategoryRepository")
 * @ORM\Table(name="Category")
 */

class Category
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
     * @ORM\Column(type="string")
     */
    protected $page;

    /**
     * @ORM\OneToMany(targetEntity="Project", mappedBy="category")
     */
    protected $projects;

    public function __construct()
    {
        $this->projects = new ArrayCollection();
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

        $this->setPage($this->name);
    }

    /**
     * @return mixed
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param mixed $page
     */
    public function setPage($page)
    {
        $this->page = $page;
    }

    /**
     * @return mixed
     */
    public function getProjects()
    {
        return $this->projects;
    }

    public function addProject(\Crowd\FoundingBundle\Entity\Project $project)
    {
        $this->projects[] = $project;
    }

    public function removeProject(\Crowd\FoundingBundle\Entity\Project $project)
    {
        $this->projects->removeElement($project);
    }

    protected function transliterate($input)
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


    protected function slugify($text)
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
}