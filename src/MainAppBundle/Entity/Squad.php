<?php

namespace MainAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
        $this->models = new \Doctrine\Common\Collections\ArrayCollection();
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
}
