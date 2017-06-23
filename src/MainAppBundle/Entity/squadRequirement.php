<?php

namespace MainAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * squadRequirement
 *
 * @ORM\Table(name="squad_requirement")
 * @ORM\Entity(repositoryClass="MainAppBundle\Repository\squadRequirementRepository")
 */
class squadRequirement
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
     * @var int
     *
     * @ORM\Column(name="min", type="integer")
     */
    private $min;

    /**
     * @var string
     *
     * @ORM\Column(name="max", type="string", length=255)
     */
    private $max;


    /**
     * @var Models
     *
     * @ORM\ManyToMany(targetEntity="MainAppBundle\Entity\Models")
     */
    private $model;


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
     * Set min
     *
     * @param integer $min
     *
     * @return squadRequirement
     */
    public function setMin($min)
    {
        $this->min = $min;

        return $this;
    }

    /**
     * Get min
     *
     * @return int
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * Set max
     *
     * @param string $max
     *
     * @return squadRequirement
     */
    public function setMax($max)
    {
        $this->max = $max;

        return $this;
    }

    /**
     * Get max
     *
     * @return string
     */
    public function getMax()
    {
        return $this->max;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->model = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add model
     *
     * @param \MainAppBundle\Entity\Models $model
     *
     * @return squadRequirement
     */
    public function addModel(\MainAppBundle\Entity\Models $model)
    {
        $this->model[] = $model;

        return $this;
    }

    /**
     * Remove model
     *
     * @param \MainAppBundle\Entity\Models $model
     */
    public function removeModel(\MainAppBundle\Entity\Models $model)
    {
        $this->model->removeElement($model);
    }

    /**
     * Get model
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getModel()
    {
        return $this->model;
    }
}
