<?php

namespace MainAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WeaponSwitch
 *
 * @ORM\Table(name="weapon_switch")
 * @ORM\Entity(repositoryClass="MainAppBundle\Repository\WeaponSwitchRepository")
 */
class WeaponSwitch
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
     * @var Models
     *
     * @ORM\ManyToOne(targetEntity="MainAppBundle\Entity\Models", inversedBy="")
     */
    private $model;



    private $weapon;


    private $weaponList;


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
     * Set model
     *
     * @param \MainAppBundle\Entity\Models $model
     *
     * @return WeaponSwitch
     */
    public function setModel(\MainAppBundle\Entity\Models $model = null)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return \MainAppBundle\Entity\Models
     */
    public function getModel()
    {
        return $this->model;
    }
}
