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
        $categories = $em->getRepository('CrowdFoundingBundle:Category')->getAll();
        $amountProjects = 0;
        foreach ($categories as $category)
        {
            $amountProjects += count($category->getProjects());
        }

        return $this->render('CrowdFoundingBundle:Page:index.html.twig', array('categories' => $categories, 'amountProjects' => $amountProjects));
    }

    public function categoryAction($page)
    {
        $em = $this->getDoctrine()->getManager();
        if (strcasecmp($page, 'all') == 0)
        {
            $projects = $em->getRepository('CrowdFoundingBundle:Project')->findAll();
        }
        else
        {
            $id = $em->getRepository('CrowdFoundingBundle:Category')->findOneBy(array('page' => $page));
            $projects = $em->getRepository('CrowdFoundingBundle:Project')->findBy(array('category' => $id));
        }
        $categories = $em->getRepository('CrowdFoundingBundle:Category')->getAll();
        $amountProjects = 0;
        foreach ($categories as $category)
        {
            $amountProjects += count($category->getProjects());
        }
        return $this->render('CrowdFoundingBundle:Page:category.html.twig', array('projects' => $projects, 'page' => $page, 'categories' => $categories, 'amountProjects' => $amountProjects));
    }

    public function projectAction()
    {



        return $this->render('CrowdFoundingBundle:Page:project.html.twig');
    }
}
