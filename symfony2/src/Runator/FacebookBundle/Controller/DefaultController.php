<?php

namespace Runator\FacebookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('RunatorFacebookBundle:Default:index.html.twig', array('name' => $name));
    }
}
