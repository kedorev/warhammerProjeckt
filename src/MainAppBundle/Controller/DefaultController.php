<?php

namespace MainAppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MainAppBundle:Default:index.html.twig');
    }

    public function modelAction()
    {
        return $this->render('MainAppBundle:Default:Model.html.twig');
    }

}
