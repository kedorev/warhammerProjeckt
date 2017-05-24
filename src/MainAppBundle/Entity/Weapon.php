<?php

namespace MainAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Weapon
 *
 * @ORM\Table(name="weapon")
 * @ORM\Entity(repositoryClass="MainAppBundle\Repository\WeaponRepository")
 */
class Weapon
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
     * @var int
     *
     * @ORM\Column(name="reach", type="integer")
     */
    private $reach;

    /**
     * @var int
     *
     * @ORM\Column(name="Strength", type="integer")
     */
    private $strength;

    /**
     * @var int
     *
     * @ORM\Column(name="Dommage", type="integer")
     */
    private $dommage;

    /**
     * @var int
     *
     * @ORM\Column(name="armorPenetration", type="integer")
     */
    private $armorPenetration;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;


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
     * @return Weapon
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
     * Set reach
     *
     * @param integer $reach
     *
     * @return Weapon
     */
    public function setReach($reach)
    {
        $this->reach = $reach;

        return $this;
    }

    /**
     * Get reach
     *
     * @return int
     */
    public function getReach()
    {
        return $this->reach;
    }

    /**
     * Set strength
     *
     * @param integer $strength
     *
     * @return Weapon
     */
    public function setStrength($strength)
    {
        $this->strength = $strength;

        return $this;
    }

    /**
     * Get strength
     *
     * @return int
     */
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * Set armorPenetration
     *
     * @param integer $armorPenetration
     *
     * @return Weapon
     */
    public function setArmorPenetration($armorPenetration)
    {
        $this->armorPenetration = $armorPenetration;

        return $this;
    }

    /**
     * Get armorPenetration
     *
     * @return int
     */
    public function getArmorPenetration()
    {
        return $this->armorPenetration;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Weapon
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

    /**
     * Set dommage
     *
     * @param integer $dommage
     *
     * @return Weapon
     */
    public function setDommage($dommage)
    {
        $this->dommage = $dommage;

        return $this;
    }

    /**
     * Get dommage
     *
     * @return integer
     */
    public function getDommage()
    {
        return $this->dommage;
    }
}
