<?php

namespace MainAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Faction
 *
 * @ORM\Table(name="faction")
 * @ORM\Entity(repositoryClass="MainAppBundle\Repository\FactionRepository")
 */
class Faction
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;


    /**
     * @var squad
     * @ORM\OneToMany(targetEntity="MainAppBundle\Entity\Squad", mappedBy="faction")
     */
    private $squad;


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
     * Set name
     *
     * @param string $name
     *
     * @return Faction
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->squad = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add squad
     *
     * @param \MainAppBundle\Entity\Squad $squad
     *
     * @return Faction
     */
    public function addSquad(\MainAppBundle\Entity\Squad $squad)
    {
        $this->squad[] = $squad;

        return $this;
    }

    /**
     * Remove squad
     *
     * @param \MainAppBundle\Entity\Squad $squad
     */
    public function removeSquad(\MainAppBundle\Entity\Squad $squad)
    {
        $this->squad->removeElement($squad);
    }

    /**
     * Get squad
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSquad()
    {
        return $this->squad;
    }
}
