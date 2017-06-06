<?php
namespace Crowd\FoundingBundle\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use Crowd\FoundingBundle\CrowdFoundingBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('CrowdFoundingBundle:Category')->findAll();

        return $this->render('CrowdFoundingBundle:Page:index.html.twig', array('categories' => $categories));
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
