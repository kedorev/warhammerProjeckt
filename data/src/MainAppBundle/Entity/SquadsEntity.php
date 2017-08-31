<?php

namespace MainAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SquadsEntity
 *
 * @ORM\Table(name="squads_entity")
 * @ORM\Entity(repositoryClass="MainAppBundle\Repository\SquadsEntityRepository")
 */
class SquadsEntity
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
     * @var FormationEntity
     *
     * @ORM\ManyToOne(targetEntity="MainAppBundle\Entity\FormationEntity",inversedBy="SquadsEntity")
     * @ORM\JoinColumn(name="FormationEntityId")
     */
    private $formation;

    /**
     * @var Squad
     *
     * @ORM\ManyToOne(targetEntity="MainAppBundle\Entity\Squad", inversedBy="squadEntity")
     * @ORM\JoinColumn(name="squadeModelId")
     */
    private $squadModel;



    /**
     * @var array
     *
     * @ORM\OneToMany(targetEntity="MainAppBundle\Entity\ModelEntity", mappedBy="squadEntity")
     */
    private $ModelsEntity;



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
     * Set array
     *
     * @param \MainAppBundle\Entity\Squad $squadModel
     *
     * @return SquadsEntity
     */
    public function setSquadModel(\MainAppBundle\Entity\Squad $squadModel = null)
    {
        $this->squadModel = $squadModel;

        return $this;
    }

    /**
     * Get squadModel
     *
     * @return \MainAppBundle\Entity\Squad
     */
    public function getSquadModel()
    {
        return $this->squadModel;
    }

    /**
     * Set list
     *
     * @param \MainAppBundle\Entity\Liste $list
     *
     * @return SquadsEntity
     */
    public function setList(\MainAppBundle\Entity\Liste $list = null)
    {
        $this->list = $list;

        return $this;
    }

    /**
     * Get list
     *
     * @return \MainAppBundle\Entity\Liste
     */
    public function getList()
    {
        return $this->list;
    }

    /**
     * @return array
     */
    public function getModelsEntity()
    {
        return $this->ModelsEntity;
    }

    /**
     * @param array $ModelsEntity
     */
    public function setModelsEntity($ModelsEntity)
    {
        $this->ModelsEntity = $ModelsEntity;
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ModelsEntity = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set formation
     *
     * @param \MainAppBundle\Entity\FormationEntity $formation
     *
     * @return SquadsEntity
     */
    public function setFormation(\MainAppBundle\Entity\FormationEntity $formation = null)
    {
        $this->formation = $formation;

        return $this;
    }

    /**
     * Get formation
     *
     * @return \MainAppBundle\Entity\FormationEntity
     */
    public function getFormation()
    {
        return $this->formation;
    }

    /**
     * Add modelsEntity
     *
     * @param \MainAppBundle\Entity\ModelEntity $modelsEntity
     *
     * @return SquadsEntity
     */
    public function addModelsEntity(\MainAppBundle\Entity\ModelEntity $modelsEntity)
    {
        $this->ModelsEntity[] = $modelsEntity;

        return $this;
    }

    /**
     * Remove modelsEntity
     *
     * @param \MainAppBundle\Entity\ModelEntity $modelsEntity
     */
    public function removeModelsEntity(\MainAppBundle\Entity\ModelEntity $modelsEntity)
    {
        $this->ModelsEntity->removeElement($modelsEntity);
    }
}
