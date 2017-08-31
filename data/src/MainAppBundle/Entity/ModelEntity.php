<?php

namespace MainAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ModelEntity
 *
 * @ORM\Table(name="model_entity")
 * @ORM\Entity(repositoryClass="MainAppBundle\Repository\ModelEntityRepository")
 */
class ModelEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @var Models
     *
     * @ORM\ManyToOne(targetEntity="MainAppBundle\Entity\Models", inversedBy="ModelEntity")
     * @ORM\JoinColumn(name="modelTemplateId")
     */
    private $modelTemplate;



    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set modelTemplate
     *
     * @param \MainAppBundle\Entity\Models $modelTemplate
     *
     * @return ModelEntity
     */
    public function setModelTemplate(\MainAppBundle\Entity\Models $modelTemplate = null)
    {
        $this->modelTemplate = $modelTemplate;

        return $this;
    }

    /**
     * Get modelTemplate
     *
     * @return \MainAppBundle\Entity\Models
     */
    public function getModelTemplate()
    {
        return $this->modelTemplate;
    }
}
