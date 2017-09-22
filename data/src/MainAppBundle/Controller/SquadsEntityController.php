<?php

namespace MainAppBundle\Controller;

use MainAppBundle\Entity\FormationEntity;
use MainAppBundle\Entity\SquadsEntity;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

/**
 * Squadsentity controller.
 *
 */
class SquadsEntityController extends Controller
{

    /**
     * Creates a new squadsEntity entity.
     *
     * @Route("/list/addSquad", name="squadsentity_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $listId = $request->get('list_id');
        $idFormation = $request->get('formation_id');
        if($listId == null)
        {
            dump($listId);
            dump($request);
            $listId = $request->request->get('mainappbundle_squadsentity')['listId'];
            dump($listId);
        }
        if($idFormation == null)
        {
            $idFormation = $request->request->get('mainappbundle_squadsentity')['factionId'];
        }
        $squadsEntity = new Squadsentity();
        $form = $this->createForm('MainAppBundle\Form\SquadsEntityType', $squadsEntity);
        $form->add("listId", HiddenType::class, array("mapped"=>false, "data"=>$listId, "label"=>false));
        $form->add("factionId", HiddenType::class, array("mapped"=>false, "data"=>$idFormation, "label"=>false));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $formation = $em->getRepository(FormationEntity::class)->find($idFormation);
            $squadsEntity->setFormation($formation);
            $em->persist($squadsEntity);
            $em->flush();


            return $this->redirectToRoute('main_app_listShow',  array('id' => $listId));

        }

        return $this->render('@MainApp/squadsentity/new.html.twig', array(
            'squadsEntity' => $squadsEntity,
            'form' => $form->createView(),
        ));
    }


    /**
     * Displays a form to edit an existing squadsEntity entity.
     *
     * @Route("/squadEntity/{id}/edit", name="squadsentity_edit")
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
     * @Route("/squadEntity/{id}", name="squadsentity_delete")
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
