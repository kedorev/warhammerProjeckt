<?php
/**
 * Created by PhpStorm.
 * User: lerm
 * Date: 18/05/2017
 * Time: 11:42
 */

// src/AppBundle/DataFixtures/ORM/LoadUserData.php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MainAppBundle\Entity\Abilities;

class LoadAbilitieData extends AbstractFixture implements OrderedFixtureInterface

{
    public function load(ObjectManager $manager)
    {
        $abilities = new Abilities();
        $abilities->setName('Saviour Protocols');
        $abilities->setDescription('If a drones unit within 3" of a friendly');

        $manager->persist($abilities);
        $manager->flush();

        $this->addReference($abilities->getName(), $abilities);
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 1;
    }
}