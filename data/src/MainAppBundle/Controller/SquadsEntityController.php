<?php

namespace MainAppBundle\Controller;

use MainAppBundle\Entity\FormationEntity;
use MainAppBundle\Entity\SquadsEntity;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Squadsentity controller.
 *
 */
class SquadsEntityController extends Controller
{
    /**
     * Lists all squadsEntity entities.
     *
     * @Route("/", name="squadsentity_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $squadsEntities = $em->getRepository('MainAppBundle:SquadsEntity')->findAll();

        return $this->render('squadsentity/index.html.twig', array(
            'squadsEntities' => $squadsEntities,
        ));
    }

    /**
     * Creates a new squadsEntity entity.
     *
     * @Route("/list/{idList}/addSquadEntity/{idFormation}", name="squadsentity_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, $idList, $idFormation)
    {
        $squadsEntity = new Squadsentity();
        $form = $this->createForm('MainAppBundle\Form\SquadsEntityType', $squadsEntity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $formation = $em->getRepository(FormationEntity::class)->find($idFormation);
            $squadsEntity->setFormation($formation);
            $em->persist($squadsEntity);
            $em->flush();


            return $this->redirectToRoute('main_app_listShow',  array('id' => $idList));

        }

        return $this->render('@MainApp/squadsentity/new.html.twig', array(
            'squadsEntity' => $squadsEntity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a squadsEntity entity.
     *
     * @Route("/{id}", name="squadsentity_show")
     * @Method("GET")
     */
    public function showAction(SquadsEntity $squadsEntity)
    {
        $deleteForm = $this->createDeleteForm($squadsEntity);

        return $this->render('squadsentity/show.html.twig', array(
            'squadsEntity' => $squadsEntity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing squadsEntity entity.
     *
     * @Route("/{id}/edit", name="squadsentity_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SquadsEntity $squadsEntity)
    {
        $deleteForm = $this->createDeleteForm($squadsEntity);
        $editForm = $this->createForm('MainAppBundle\Form\SquadsEntityType', $squadsEntity);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('squadsentity_edit', array('id' => $squadsEntity->getId()));
        }

        return $this->render('squadsentity/edit.html.twig', array(
            'squadsEntity' => $squadsEntity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a squadsEntity entity.
     *
     * @Route("/{id}", name="squadsentity_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SquadsEntity $squadsEntity)
    {
        $form = $this->createDeleteForm($squadsEntity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($squadsEntity);
            $em->flush();
        }

        return $this->redirectToRoute('squadsentity_index');
    }

    /**
     * Creates a form to delete a squadsEntity entity.
     *
     * @param SquadsEntity $squadsEntity The squadsEntity entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SquadsEntity $squadsEntity)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('squadsentity_delete', array('id' => $squadsEntity->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
