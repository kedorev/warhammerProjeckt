<?php

namespace MainAppBundle\Controller;

use Doctrine\ORM\Tools\ToolsException;
use MainAppBundle\Entity\ModelEntity;
use MainAppBundle\Entity\SquadsEntity;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;


/**
 * Modelentity controller.
 *
 */
class ModelEntityController extends Controller
{
    /**
     * Lists all modelEntity entities.
     *
     * @Route("/modelentity", name="modelentity_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $modelEntities = $em->getRepository('MainAppBundle:ModelEntity')->findAll();

        return $this->render('modelentity/index.html.twig', array(
            'modelEntities' => $modelEntities,
        ));
    }

    /**
     * Creates a new modelEntity entity.
     * @Route("/list/addModel", name="modelentity_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $listId = $request->get('list_id');
        $idSquad = $request->get('squad_id');
        if($listId == null)
        {
            $listId = $request->request->get('mainappbundle_modelentity')['listId'];
        }
        if($idSquad == null)
        {
            $idSquad = $request->request->get('mainappbundle_modelentity')['squadId'];
        }
        dump($idSquad);
        $modelEntity = new Modelentity();
        $form = $this->createForm('MainAppBundle\Form\ModelEntityType', $modelEntity);
        $form->add("listId", HiddenType::class, array("mapped"=>false, "data"=>$listId, "label"=>false));
        $form->add("squadId", HiddenType::class, array("mapped"=>false, "data"=>$idSquad, "label"=>false));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($modelEntity);

            dump($_POST);
            $squadsEntity = $em->getRepository(SquadsEntity::class)->find($idSquad);
            $modelEntity->setSquadEntity($squadsEntity);
            $em->flush();

            return $this->redirectToRoute('main_app_listShow',  array('id' => $listId));
        }

        return $this->render('@MainApp/modelentity/new.html.twig', array(
            'modelEntity' => $modelEntity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a modelEntity entity.
     *
     * @Route("/modelentity/{id}", name="modelentity_show")
     * @Method("GET")
     */
    public function showAction(ModelEntity $modelEntity)
    {
        $deleteForm = $this->createDeleteForm($modelEntity);

        return $this->render('modelentity/show.html.twig', array(
            'modelEntity' => $modelEntity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing modelEntity entity.
     *
     * @Route("/modelentity/{id}/edit", name="modelentity_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ModelEntity $modelEntity)
    {
        $deleteForm = $this->createDeleteForm($modelEntity);
        $editForm = $this->createForm('MainAppBundle\Form\ModelEntityType', $modelEntity);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('modelentity_edit', array('id' => $modelEntity->getId()));
        }

        return $this->render('modelentity/edit.html.twig', array(
            'modelEntity' => $modelEntity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a modelEntity entity.
     *
     * @Route("/modelentity/{id}", name="modelentity_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ModelEntity $modelEntity)
    {
        $form = $this->createDeleteForm($modelEntity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($modelEntity);
            $em->flush();
        }

        return $this->redirectToRoute('modelentity_index');
    }

    /**
     * Creates a form to delete a modelEntity entity.
     *
     * @param ModelEntity $modelEntity The modelEntity entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ModelEntity $modelEntity)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('modelentity_delete', array('id' => $modelEntity->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
