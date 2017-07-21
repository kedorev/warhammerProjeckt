<?php
/**
 * Created by PhpStorm.
 * User: lerm
 * Date: 21/07/2017
 * Time: 17:47
 */


namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MainAppBundle\Entity\Liste;

class LoadListeData extends AbstractFixture implements OrderedFixtureInterface

{
    public function load(ObjectManager $manager)
    {
        $keyWords = array(
            '0' => array(
                "name" => "Tau test",
                "points" => "1500",
            ),
        );

        foreach($keyWords as $factionData)
        {
            $liste = new Liste();
            $liste->setName($factionData["name"]);
            $liste->setPointsLimit($factionData["points"]);

            $manager->persist($liste);
            $manager->flush();

            $this->addReference($liste->getName(), $liste);
        }
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 1;
    }
}