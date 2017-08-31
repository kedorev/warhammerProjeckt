<?php

namespace MainAppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Liste
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

    /**
     * @var int
     *
     * @ORM\Column(name="points_limit", type="integer")
     * @Assert\NotBlank()
     * @Assert\Type("Symfony\Component\Form\Extension\Core\Type\IntegerType")
     */
    private $pointsLimit;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string")
     * @Assert\NotBlank()
     * @Assert\Type("\String")
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
     * @ORM\OneToMany(targetEntity="MainAppBundle\Entity\FormationEntity", mappedBy="list")
     */
    private $formationsListe;


    /**
     * Liste constructor.
     */
    public function __construct()
    {
        $this->SquadsEntity = new ArrayCollection();
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
     * Set pointsLimit
     *
     * @param integer $pointsLimit
     *
     * @return Liste
     */
    public function setPointsLimit($pointsLimit)
    {
        $this->pointsLimit = $pointsLimit;

        return $this;
    }

    /**
     * Get pointsLimit
     *
     * @return integer
     */
    public function getPointsLimit()
    {
        return $this->pointsLimit;
    }

    /**
     * Add formationsListe
     *
     * @param \MainAppBundle\Entity\FormationEntity $formationsListe
     *
     * @return Liste
     */
    public function addFormationsListe(\MainAppBundle\Entity\FormationEntity $formationsListe)
    {
        $this->formationsListe[] = $formationsListe;

        return $this;
    }

    /**
     * Remove formationsListe
     *
     * @param \MainAppBundle\Entity\FormationEntity $formationsListe
     */
    public function removeFormationsListe(\MainAppBundle\Entity\FormationEntity $formationsListe)
    {
        $this->formationsListe->removeElement($formationsListe);
    }

    /**
     * Get formationsListe
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFormationsListe()
    {
        return $this->formationsListe;
    }
}
