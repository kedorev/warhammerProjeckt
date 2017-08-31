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
     * @var Liste
     *
     * @ORM\ManyToOne(targetEntity="MainAppBundle\Entity\Liste",inversedBy="SquadsEntity")
     */
    private $list;

    /**
     * @var Squad
     *
     * @ORM\ManyToOne(targetEntity="MainAppBundle\Entity\Squad", inversedBy="squadEntity")
     * @ORM\JoinColumn(name="squadeModelId")
     */
    private $squadModel;




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
     * Set squadModel
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
}
