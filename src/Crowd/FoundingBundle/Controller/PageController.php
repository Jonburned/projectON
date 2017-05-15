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
}
