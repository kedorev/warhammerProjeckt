<?php

namespace MainAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FormationEntity
 *
 * @ORM\Table(name="formation_entity")
 * @ORM\Entity(repositoryClass="MainAppBundle\Repository\FormationEntityRepository")
 */
class FormationEntity
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
     * @var Liste
     * @ORM\ManyToOne(targetEntity="MainAppBundle\Entity\Liste", inversedBy="formationsListe")
     */
    private $list;


    /**
     * @var array
     *
     * @ORM\OneToMany(targetEntity="MainAppBundle\Entity\SquadsEntity", mappedBy="formation")
     */
    private $SquadsEntity;



    /**
     * @var Models
     *
     * @ORM\ManyToOne(targetEntity="MainAppBundle\Entity\Formation", inversedBy="formationEntities")
     * @ORM\JoinColumn(name="formationTemplateId")
     */
    private $formationModel;

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
     * Constructor
     */
    public function __construct()
    {
        $this->SquadsEntity = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set list
     *
     * @param \MainAppBundle\Entity\Liste $list
     *
     * @return FormationEntity
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
     * Add squadsEntity
     *
     * @param \MainAppBundle\Entity\SquadsEntity $squadsEntity
     *
     * @return FormationEntity
     */
    public function addSquadsEntity(\MainAppBundle\Entity\SquadsEntity $squadsEntity)
    {
        $this->SquadsEntity[] = $squadsEntity;

        return $this;
    }

    /**
     * Remove squadsEntity
     *
     * @param \MainAppBundle\Entity\SquadsEntity $squadsEntity
     */
    public function removeSquadsEntity(\MainAppBundle\Entity\SquadsEntity $squadsEntity)
    {
        $this->SquadsEntity->removeElement($squadsEntity);
    }

    /**
     * Get squadsEntity
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSquadsEntity()
    {
        return $this->SquadsEntity;
    }

    /**
     * Set formationModel
     *
     * @param \MainAppBundle\Entity\Formation $formationModel
     *
     * @return FormationEntity
     */
    public function setFormationModel(\MainAppBundle\Entity\Formation $formationModel = null)
    {
        $this->formationModel = $formationModel;

        return $this;
    }

    /**
     * Get formationModel
     *
     * @return \MainAppBundle\Entity\Formation
     */
    public function getFormationModel()
    {
        return $this->formationModel;
    }
}
