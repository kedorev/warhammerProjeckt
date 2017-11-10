<?php

namespace MainAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ModelEntity
 *
 * @ORM\Table(name="model_entity")
 * @ORM\Entity(repositoryClass="MainAppBundle\Repository\ModelEntityRepository")
 */
class ModelEntity
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
     * @ORM\ManyToOne(targetEntity="MainAppBundle\Entity\Models", inversedBy="ModelEntity")
     * @ORM\JoinColumn(name="modelTemplateId")
     */
    private $modelTemplate;


    /**
     * @var SquadsEntity
     *
     * @ORM\ManyToOne(targetEntity="MainAppBundle\Entity\SquadsEntity",inversedBy="ModelsEntity")
     */
    private $squadEntity;

    /**
     * @var
     * @ORM\OneToOne(targetEntity="MainAppBundle\Entity\ProfilEntity")
     */
    private $profilEntity;


    /**
     * @var
     * @ORM\ManyToMany(targetEntity="MainAppBundle\Entity\Weapon")
     */
    private $weapons;


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
     * Set modelTemplate
     *
     * @param \MainAppBundle\Entity\Models $modelTemplate
     *
     * @return ModelEntity
     */
    public function setModelTemplate(\MainAppBundle\Entity\Models $modelTemplate = null)
    {
        $this->modelTemplate = $modelTemplate;

        return $this;
    }

    /**
     * Get modelTemplate
     *
     * @return \MainAppBundle\Entity\Models
     */
    public function getModelTemplate()
    {
        return $this->modelTemplate;
    }

    /**
     * @return SquadsEntity
     */
    public function getSquadEntity()
    {
        return $this->squadEntity;
    }

    /**
     * @param SquadsEntity $squadEntity
     */
    public function setSquadEntity(SquadsEntity $squadsEntity)
    {
        $this->squadEntity = $squadsEntity;
    }




    /**
     * Set profilEntity
     *
     * @param \MainAppBundle\Entity\ProfilEntity $profilEntity
     *
     * @return ModelEntity
     */
    public function setProfilEntity(\MainAppBundle\Entity\ProfilEntity $profilEntity = null)
    {
        $this->profilEntity = $profilEntity;

        return $this;
    }

    /**
     * Get profilEntity
     *
     * @return \MainAppBundle\Entity\ProfilEntity
     */
    public function getProfilEntity()
    {
        return $this->profilEntity;
    }


    public function getProfilForCurrentLife()
    {
        $model = $this->getModelTemplate();
        $pv = $this->getProfilEntity()->getWound();
        $profil = $model->getProfilsByWound($pv);
        return $profil;
    }

    public function __toString(): string
    {
        return $this->getModelTemplate()->getName();
    }



    public function getTotalPoint(): int
    {
        $point = $this->getModelTemplate()->getPoint();
        foreach ( $this->getModelTemplate()->getWeapons() as $weapon )
        {
            $point = $point + $weapon->getPrice();
        }
        return $point;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->weapons = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add weapon
     *
     * @param \MainAppBundle\Entity\Weapon $weapon
     *
     * @return ModelEntity
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
}
