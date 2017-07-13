<?php

namespace MainAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Squad
 *
 * @ORM\Table(name="squad")
 * @ORM\Entity(repositoryClass="MainAppBundle\Repository\SquadRepository")
 */
class Squad
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
     * @var ArrayCollection
     *
     *@ORM\OneToMany(targetEntity="MainAppBundle\Entity\squadRequirement", mappedBy="squad")
     */
    private $squadeRequirements;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;


    /**
     * @var array(Models)
     *
     * @ORM\ManyToMany(targetEntity="MainAppBundle\Entity\Models")
     */
    private $models;


    /**
     * @var int
     *
     * @ORM\Column(name="min", type="integer")
     */
    private $min;

    /**
     * @var int
     *
     * @ORM\Column(name="min", type="integer")
     */
    private $max;


    /**
     * @var faction
     *
     * @ORM\ManyToOne(targetEntity="MainAppBundle\Entity\Faction", inversedBy="squad")
     */
    private $faction;

    /**
     * @var SquadType
     *
     * @ORM\ManyToOne(targetEntity="MainAppBundle\Entity\SquadType", inversedBy="squads")
     * @ORM\JoinColumn(name="typeSquadId", referencedColumnName="id")
     */
    private $type;

    public function __construct() {
        $this->models = new ArrayCollection();
        $this->squadeRequirements = new ArrayCollection();
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
     * @return Squad
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
     * Add model
     *
     * @param \MainAppBundle\Entity\Models $model
     *
     * @return Squad
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
     * @param \MainAppBundle\Entity\SquadType $type
     *
     * @return Squad
     */
    public function setType(\MainAppBundle\Entity\SquadType $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \MainAppBundle\Entity\SquadType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set faction
     *
     * @param \MainAppBundle\Entity\Faction $faction
     *
     * @return Squad
     */
    public function setFaction(\MainAppBundle\Entity\Faction $faction = null)
    {
        $this->faction = $faction;

        return $this;
    }

    /**
     * Get faction
     *
     * @return \MainAppBundle\Entity\Faction
     */
    public function getFaction()
    {
        return $this->faction;
    }

    /**
     * Add squadeRequirement
     *
     * @param \MainAppBundle\Entity\squadRequirement $squadeRequirement
     *
     * @return Squad
     */
    public function addSquadeRequirement(\MainAppBundle\Entity\squadRequirement $squadeRequirement)
    {
        $this->squadeRequirements[] = $squadeRequirement;

        return $this;
    }

    /**
     * Remove squadeRequirement
     *
     * @param \MainAppBundle\Entity\squadRequirement $squadeRequirement
     */
    public function removeSquadeRequirement(\MainAppBundle\Entity\squadRequirement $squadeRequirement)
    {
        $this->squadeRequirements->removeElement($squadeRequirement);
    }

    /**
     * Get squadeRequirements
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSquadeRequirements()
    {
        return $this->squadeRequirements;
    }
}
