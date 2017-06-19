<?php

namespace MainAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Models
 *
 * @ORM\Table(name="models")
 * @ORM\Entity(repositoryClass="MainAppBundle\Repository\ModelsRepository")
 */
class Models
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
     * @ORM\Column(name="toughness", type="integer")
     */
    private $toughness;

    /**
     * @var int
     *
     * @ORM\Column(name="Wound", type="integer")
     */
    private $wound;


    /**
     * @var int
     *
     * @ORM\Column(name="Leadership", type="integer")
     */
    private $leadership;

    /**
     * @var int
     *
     * @ORM\Column(name="Save", type="integer")
     */
    private $save;


    /**
     * @var Models
     */
    private $profils;


    /**
     * @var array(Abilities)
     *
     * @ORM\ManyToMany(targetEntity="MainAppBundle\Entity\Abilities")
     */
    private $abilities;


    /**
     * @var array(KeyWord)
     *
     * @ORM\ManyToMany(targetEntity="MainAppBundle\Entity\KeyWord")
     */
    private $keysWord;


    /**
     * @var integer
     *
     * @ORM\Column(name="power", type="integer")
     */
    private $power;


    /**
     * @var integer
     *
     * @ORM\Column(name="point", type="integer")
     */
    private $point;

    /**
     * @var array(Weapon)
     *
     * @ORM\ManyToMany(targetEntity="MainAppBundle\Entity\Weapon")
     */
    private $weapons;



    public function __construct() {
        $this->abilities = new \Doctrine\Common\Collections\ArrayCollection();
        $this->keysWord = new \Doctrine\Common\Collections\ArrayCollection();
        $this->weapons = new \Doctrine\Common\Collections\ArrayCollection();
        $this->profils = new \Doctrine\Common\Collections\ArrayCollection();
    }





    /**
     * Add ability
     *
     * @param \MainAppBundle\Entity\Abilities $ability
     *
     * @return Models
     */
    public function addAbility(\MainAppBundle\Entity\Abilities $ability)
    {
        $this->abilities[] = $ability;

        return $this;
    }

    /**
     * Remove ability
     *
     * @param \MainAppBundle\Entity\Abilities $ability
     */
    public function removeAbility(\MainAppBundle\Entity\Abilities $ability)
    {
        $this->abilities->removeElement($ability);
    }

    /**
     * Get abilities
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAbilities()
    {
        return $this->abilities;
    }

    /**
     * Add keysWord
     *
     * @param \MainAppBundle\Entity\KeyWord $keysWord
     *
     * @return Models
     */
    public function addKeysWord(\MainAppBundle\Entity\KeyWord $keysWord)
    {
        $this->keysWord[] = $keysWord;

        return $this;
    }

    /**
     * Remove keysWord
     *
     * @param \MainAppBundle\Entity\KeyWord $keysWord
     */
    public function removeKeysWord(\MainAppBundle\Entity\KeyWord $keysWord)
    {
        $this->keysWord->removeElement($keysWord);
    }

    /**
     * Get keysWord
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getKeysWord()
    {
        return $this->keysWord;
    }

    /**
     * Add weapon
     *
     * @param \MainAppBundle\Entity\Weapon $weapon
     *
     * @return Models
     */
    public function addWeapon(\MainAppBundle\Entity\Weapon $weapon)
    {
        $this->weapons[] = $weapon;

        return $this;
    }

    /**
     * Remove weapon
     *
     * @param \MainAppBundle\Entity\Weapon $weapon
     */
    public function removeWeapon(\MainAppBundle\Entity\Weapon $weapon)
    {
        $this->weapons->removeElement($weapon);
    }

    /**
     * Get weapons
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWeapons()
    {
        return $this->weapons;
    }

    /**
     * @return int
     */
    public function getPower()
    {
        return $this->power;
    }

    /**
     * @param int $power
     */
    public function setPower($power)
    {
        $this->power = $power;
    }

    /**
     * Get id
     *
     * @return integer
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
     * @return Models
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
     * Set toughness
     *
     * @param integer $toughness
     *
     * @return Models
     */
    public function setToughness($toughness)
    {
        $this->toughness = $toughness;

        return $this;
    }

    /**
     * Get toughness
     *
     * @return integer
     */
    public function getToughness()
    {
        return $this->toughness;
    }

    /**
     * Set wound
     *
     * @param integer $wound
     *
     * @return Models
     */
    public function setWound($wound)
    {
        $this->wound = $wound;

        return $this;
    }

    /**
     * Get wound
     *
     * @return integer
     */
    public function getWound()
    {
        return $this->wound;
    }

    /**
     * Set leadership
     *
     * @param integer $leadership
     *
     * @return Models
     */
    public function setLeadership($leadership)
    {
        $this->leadership = $leadership;

        return $this;
    }

    /**
     * Get leadership
     *
     * @return integer
     */
    public function getLeadership()
    {
        return $this->leadership;
    }

    /**
     * Set save
     *
     * @param integer $save
     *
     * @return Models
     */
    public function setSave($save)
    {
        $this->save = $save;

        return $this;
    }

    /**
     * Get save
     *
     * @return integer
     */
    public function getSave()
    {
        return $this->save;
    }

    /**
     * Set point
     *
     * @param integer $point
     *
     * @return Models
     */
    public function setPoint($point)
    {
        $this->point = $point;

        return $this;
    }

    /**
     * Get point
     *
     * @return integer
     */
    public function getPoint()
    {
        return $this->point;
    }


    /**
     * return how many profil is linked
     *
     * @return int
     */
    public function getNbProfil()
    {
        return count($this->profils);
    }
}
