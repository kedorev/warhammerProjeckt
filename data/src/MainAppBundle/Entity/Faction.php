<?php

namespace MainAppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
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
     * @var
     *
     * @ORM\Column(name="type", type="string", length=64)
     */
    private $type;

    /**
     * @var squad
     * @ORM\OneToMany(targetEntity="MainAppBundle\Entity\Squad", mappedBy="faction")
     */
    private $squad;

    /**
     * @var Models
     *
     * @ORM\ManyToMany(targetEntity="MainAppBundle\Entity\Models")
     */
    private $models;

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
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName(): string
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
    public function getSquad(): ArrayCollection
    {
        return $this->squad;
    }

    /**
     * Add model
     *
     * @param \MainAppBundle\Entity\Models $model
     *
     * @return Faction
     */
    public function addModel(\MainAppBundle\Entity\Models $model)
    {
        $this->models[] = $model;

        return $this;
    }

    /**
     * Remove model
     *
     * @param \MainAppBundle\Entity\Models $model
     */
    public function removeModel(\MainAppBundle\Entity\Models $model)
    {
        $this->models->removeElement($model);
    }

    /**
     * Get models
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getModels()
    {
        return $this->models;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Faction
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    public function __toString()
    {
        return $this->getName();
    }
}
