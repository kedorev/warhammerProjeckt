<?php

namespace MainAppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction( Request $request )
    {
        $session = $request->getSession();
        if(!isset($session))
        {
            $session = new Session();
            $session->set("test","debug");
        }

        return $this->render('MainAppBundle:Default:index.html.twig');
    }

    public function modelAction(Request $request)
    {
        $session = $request->getSession();


        return $this->render('MainAppBundle:Default:Model.html.twig');
    }

}
