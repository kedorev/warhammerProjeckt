<?php
/**
 * Created by PhpStorm.
 * User: lerm
 * Date: 17/07/2017
 * Time: 17:12
 */


namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MainAppBundle\Entity\Formation;
use MainAppBundle\Entity\FormationRequirement;

class LoadFormationData extends AbstractFixture implements OrderedFixtureInterface

{
    public function load(ObjectManager $manager)
    {
        $modelsData = array(
            "Brigade",
        );


        foreach($modelsData as $modelData)
        {
            $formation = new Formation();
            $formation->setName($modelData);

            $manager->persist($formation);
            $manager->flush();

            $this->addReference($formation->getName(), $formation);
        }
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 5;
    }
}