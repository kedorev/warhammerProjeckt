<?php

namespace MainAppBundle\Controller;

use Doctrine\DBAL\Types\IntegerType;
use MainAppBundle\Entity\Liste;
use MainAppBundle\Form\ListType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use MainAppBundle\Entity\Models;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


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

    /**
     * @Route("/squads", name="main_app_squad")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function squadAction(Request $request)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('MainAppBundle:Squad');
        $squads = $repository->findAll();
        foreach($squads['0']->getSquadRequirements() as $requirement)
        {
            dump($requirement);
        }
        return $this->render('@MainApp/Default/squad.html.twig', array('squads' => $squads));
    }

    /**
     * @Route("/list", name="main_app_list")
     */
    public function listAction(Request $request)
    {
        // On cr�e le FormBuilder gr�ce au service form factory
        $list = new Liste();
        $form = $this->get('form.factory')->createBuilder(ListType::class, $list);

        // On passe la m�thode createView() du formulaire � la vue
        // afin qu'elle puisse afficher le formulaire toute seule
        return $this->render('@MainApp/Default/list.html.twig', array(
            'form' => $form->createView(),
        ));
    }


}
