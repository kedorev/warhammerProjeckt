<?php

namespace MainAppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use MainAppBundle\Entity\Models;
use MainAppBundle\Entity\CONSTANT;
use Doctrine\ORM\EntityManagerInterface;


class DefaultController extends Controller
{
    public function indexAction( Request $request )
    {
        return $this->render('MainAppBundle:Default:index.html.twig');
    }

    public function modelAction(Request $request)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('MainAppBundle:Models');
        $models = $repository->findAll();
        dump($models[0]->getWeapons());

        return $this->render('MainAppBundle:Default:Model.html.twig', array('models' => $models));
    }

    public function factionsAction(Request $request)
    {
        return $this->render('MainAppBundle:Default:factions.html.twig');
    }

    public function factionAction(Request $request, $faction)
    {

    }
}
