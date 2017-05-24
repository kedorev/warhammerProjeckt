<?php

namespace MainAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SquadType
 *
 * @ORM\Table(name="squad_type")
 * @ORM\Entity(repositoryClass="MainAppBundle\Repository\SquadTypeRepository")
 */
class SquadType
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
     * @var array(squads)
     *
     * @ORM\OneToMany(targetEntity="MainAppBundle\Entity\Squad", mappedBy="type")
     */
    private $squads;

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
        $this->squads = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add squad
     *
     * @param \MainAppBundle\Entity\Squad $squad
     *
     * @return SquadType
     */
    public function addSquad(\MainAppBundle\Entity\Squad $squad)
    {
        $this->squads[] = $squad;

        return $this;
    }

    /**
     * Remove squad
     *
     * @param \MainAppBundle\Entity\Squad $squad
     */
    public function removeSquad(\MainAppBundle\Entity\Squad $squad)
    {
        $this->squads->removeElement($squad);
    }

    /**
     * Get squads
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSquads()
    {
        return $this->squads;
    }
}
