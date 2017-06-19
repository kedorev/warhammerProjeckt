<?php

namespace MainAppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * List
 *
 * @ORM\Table(name="list")
 * @ORM\Entity(repositoryClass="MainAppBundle\Repository\ListRepository")
 */
class Liste
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
     * @ORM\Column(name="name", type="string")
     */
    private $name;

    /**
     * @var user
     *
     * @ORM\ManyToOne(targetEntity="User")
     */
    private $owner;


    /**
     * @var Squad
     *
     * @ORM\ManyToMany(targetEntity="MainAppBundle\Entity\Squad")
     */
    private $Squads;


    /**
     * Liste constructor.
     */
    public function __construct()
    {
        $this->Squads = new \Doctrine\Common\Collections\ArrayCollection();
    }


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
     * @return Liste
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
     * Set owner
     *
     * @param \MainAppBundle\Entity\User $owner
     *
     * @return Liste
     */
    public function setOwner(\MainAppBundle\Entity\User $owner = null)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return \MainAppBundle\Entity\User
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Add squad
     *
     * @param \MainAppBundle\Entity\Squad $squad
     *
     * @return Liste
     */
    public function addSquad(\MainAppBundle\Entity\Squad $squad)
    {
        $this->Squads[] = $squad;

        return $this;
    }

    /**
     * Remove squad
     *
     * @param \MainAppBundle\Entity\Squad $squad
     */
    public function removeSquad(\MainAppBundle\Entity\Squad $squad)
    {
        $this->Squads->removeElement($squad);
    }

    /**
     * Get squads
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSquads()
    {
        return $this->Squads;
    }
}
