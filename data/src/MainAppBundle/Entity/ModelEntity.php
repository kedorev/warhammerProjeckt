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
    public function getSquadEntity():?SquadsEntity
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

    public function __toString()
    {
        return $this->getModelTemplate()->getName();
    }

}
