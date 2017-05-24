<?php
namespace Crowd\FoundingBundle\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use Crowd\FoundingBundle\CrowdFoundingBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    public function indexAction()
    {
        return $this->render('CrowdFoundingBundle:Page:index.html.twig');
    }

    public function categoryAction()
    {
        return $this->render('CrowdFoundingBundle:Page:category.html.twig');
    }

    public function projectAction()
    {
        return $this->render('CrowdFoundingBundle:Page:project.html.twig');
    }
}
