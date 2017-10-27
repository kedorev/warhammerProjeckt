<?php

namespace MainAppBundle\Form;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use MainAppBundle\Entity\Models;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ModelEntityType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('modelTemplate', EntityType::class, [
            'class' => Models::class,
            'query_builder' => function (EntityRepository $repository) use ($options) {
                return $repository->getAllModelFromSquadWithoutExec($options['squad_type']);
            }
        ])->remove('squadEntity')->remove('profilEntity');

    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setRequired('squad_type');
        $resolver->setDefaults(array(
            'data_class' => 'MainAppBundle\Entity\ModelEntity'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'mainappbundle_modelentity';
    }


}
