<?php

namespace MainAppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use MainAppBundle\Entity\Models;
use MainAppBundle\Entity\CONSTANT;
use Doctrine\ORM\EntityManagerInterface;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="main_app_index");
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction( Request $request )
    {
        return $this->render('MainAppBundle:Default:index.html.twig');
    }

    /**
     * @Route("/Models", name="main_app_model")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function modelAction(Request $request)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('MainAppBundle:Models');
        $models = $repository->findAll();

        return $this->render('MainAppBundle:Default:Model.html.twig', array('models' => $models));
    }

    /**
     * @Route("/factions", name="main_app_factions")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function factionsAction(Request $request)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('MainAppBundle:Faction');

        $factionsType = $repository->getAllType();

        foreach($factionsType as $factionType)
        {
            $factions[$factionType["type"]] = $repository->getTypeFactionSortByName($factionType["type"]);
        }
        return $this->render('MainAppBundle:Default:factions.html.twig', array('factions' => $factions));
    }

    /**
     * @Route("/faction/{faction}", name="main_app_faction")
     *
     * @param Request $request
     * @param $faction
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function factionAction(Request $request,string $faction)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('MainAppBundle:Models');
        $models = $repository->getAllModelByFaction($faction);

        return $this->render('@MainApp/Default/Model.html.twig', array('models' => $models));
    }
}
