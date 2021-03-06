<?php

namespace MainAppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Security\Core\User\User;
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
     * @var
     * @ORM\ManyToOne(targetEntity="MainAppBundle\Entity\Visibility")
     */
    private $visibility;

    /**
     * @var int
     *
     * @ORM\Column(name="points_limit", type="integer")
     * @Assert\NotBlank()
     * @Assert\GreaterThan( value = 0 )
     *
     */
    private $pointsLimit;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string")
     * @Assert\NotBlank()
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
     * @var integer
     * @ORM\Column(type="integer", name="artefact_number")
     */
    private $artefactNumber;

    /**
     * @var
     * @ORM\ManyToMany(targetEntity="MainAppBundle\Entity\Artefact")
     */
    private $artefacts;

    /**
     * Liste constructor.
     */
    public function __construct()
    {
        $this->SquadsEntity = new ArrayCollection();
        $this->artefacts = new ArrayCollection();
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
    public function getName(): ?string
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
    public function setOwner($owner = null)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return \MainAppBundle\Entity\User
     */
    public function getOwner(): User
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
    public function setPointsLimit(int $pointsLimit)
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

    /**
     * Set artefactNumber
     *
     * @param integer $artefactNumber
     *
     * @return Liste
     */
    public function setArtefactNumber(int $artefactNumber)
    {
        $this->artefactNumber = $artefactNumber;

        return $this;
    }

    /**
     * Get artefactNumber
     *
     * @return integer
     */
    public function getArtefactNumber(): int
    {
        return $this->artefactNumber;
    }

    /**
     * Add artefact
     *
     * @param \MainAppBundle\Entity\Artefact $artefact
     *
     * @return Liste
     */
    public function addArtefact(\MainAppBundle\Entity\Artefact $artefact)
    {
        $this->artefacts[] = $artefact;

        return $this;
    }

    /**
     * Remove artefact
     *
     * @param \MainAppBundle\Entity\Artefact $artefact
     */
    public function removeArtefact(\MainAppBundle\Entity\Artefact $artefact)
    {
        $this->artefacts->removeElement($artefact);
    }

    /**
     * Get artefacts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArtefacts()
    {
        return $this->artefacts;
    }



    public function getTotalPoint(): int
    {
        $point = 0;
        foreach ( $this->getFormationsListe() as $formationEntity )
        {
            $point = $point + $formationEntity->getTotalPoint();
        }
        return $point;
    }


    public function getCommandPoint() :int
    {
        $commandPoint = 3;
        foreach($this->getFormationsListe() as $formation)
        {
            $commandPoint = $commandPoint + $formation->getCommandPoint();
        }
        return $commandPoint;
    }


    public function getAvailableCommandPoint(): int
    {
        $nbArtefact = $this->getArtefactNumber();
        if($nbArtefact ==  0 || $nbArtefact ==  1 )
        {
            return $this->getCommandPoint();
        }
        elseif ($nbArtefact == 2)
        {
            return $this->getCommandPoint() -1;
        }
        elseif ($nbArtefact == 3)
        {
            return $this->getCommandPoint() -3;
        }
        throw new \Exception("Wrong artefact number");
    }

    public function isValid()
    {
        if($this->getTotalPoint() > $this->getPointsLimit())
        {
            return false;
        }

        return true;
    }

    /**
     * Set visibility
     *
     * @param \MainAppBundle\Entity\Visibility $visibility
     *
     * @return Liste
     */
    public function setVisibility(\MainAppBundle\Entity\Visibility $visibility = null)
    {
        $this->visibility = $visibility;

        return $this;
    }

    /**
     * Get visibility
     *
     * @return \MainAppBundle\Entity\Visibility
     */
    public function getVisibility()
    {
        return $this->visibility;
    }
}
