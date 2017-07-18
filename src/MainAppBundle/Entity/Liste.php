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

    /**.
     * @var int
     *
     * @ORM\Column(name="point", type="integer")
     */
    private $point;

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
     * @var array
     *
     * @ORM\OneToMany(targetEntity="MainAppBundle\Entity\SquadsEntity", mappedBy="list")
     */
    private $SquadsEntity;


    /**
     * Liste constructor.
     */
    public function __construct()
    {
        $this->SquadsEntity = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add squadsEntity
     *
     * @param \MainAppBundle\Entity\SquadsEntity $squadsEntity
     *
     * @return Liste
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
     * @return int
     */
    public function getPoint()
    {
        return $this->point;
    }

    /**
     * @param int $point
     */
    public function setPoint($point)
    {
        $this->point = $point;
    }


}
