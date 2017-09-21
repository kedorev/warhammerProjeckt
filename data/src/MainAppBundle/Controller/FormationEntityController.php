<?php

namespace MainAppBundle\Controller;

use MainAppBundle\Entity\FormationEntity;
use MainAppBundle\Entity\Liste;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Formationentity controller.
 *
 */
class FormationEntityController extends Controller
{
    /**
     * Lists all formationEntity entities.
     *
     * @Route("/", name="formationentity_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $formationEntities = $em->getRepository('MainAppBundle:FormationEntity')->findAll();

        return $this->render('formationentity/index.html.twig', array(
            'formationEntities' => $formationEntities,
        ));
    }

    /**
     * Creates a new formationEntity entity.
     *
     * @Route("/list/{id}/addFormation", name="addFormationRoute")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, $id)
    {
        $formationEntity = new Formationentity();
        $form = $this->createForm('MainAppBundle\Form\FormationEntityType', $formationEntity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $list = $em->getRepository(Liste::class)->find($id);
            $formationEntity->setList($list);
            $em->persist($formationEntity);
            $em->flush();

            return $this->redirectToRoute('main_app_listShow',  array('id' => $id));
        }

        return $this->render('@MainApp/formationentity/new.html.twig', array(
            'formationEntity' => $formationEntity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a formationEntity entity.
     *
     * @Route("/{id}", name="formationentity_show")
     * @Method("GET")
     */
    public function showAction(FormationEntity $formationEntity)
    {
        $deleteForm = $this->createDeleteForm($formationEntity);

        return $this->render('formationentity/show.html.twig', array(
            'formationEntity' => $formationEntity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing formationEntity entity.
     *
     * @Route("/{id}/edit", name="formationentity_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, FormationEntity $formationEntity)
    {
        $deleteForm = $this->createDeleteForm($formationEntity);
        $editForm = $this->createForm('MainAppBundle\Form\FormationEntityType', $formationEntity);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('formationentity_edit', array('id' => $formationEntity->getId()));
        }

        return $this->render('formationentity/edit.html.twig', array(
            'formationEntity' => $formationEntity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a formationEntity entity.
     *
     * @Route("/{id}", name="formationentity_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, FormationEntity $formationEntity)
    {
        $form = $this->createDeleteForm($formationEntity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($formationEntity);
            $em->flush();
        }

        return $this->redirectToRoute('formationentity_index');
    }

    /**
     * Creates a form to delete a formationEntity entity.
     *
     * @param FormationEntity $formationEntity The formationEntity entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(FormationEntity $formationEntity)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('formationentity_delete', array('id' => $formationEntity->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
