<?php

namespace Crowd\FoundingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CrowdFoundingBundle:Default:index.html.twig');
    }
}
