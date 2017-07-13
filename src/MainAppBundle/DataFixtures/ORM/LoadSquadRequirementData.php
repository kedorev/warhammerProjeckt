<?php
/**
 * Created by PhpStorm.
 * User: lerm
 * Date: 13/07/2017
 * Time: 14:01
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MainAppBundle\Entity\squadRequirement;

class LoadSquadRequirementData extends AbstractFixture implements OrderedFixtureInterface

{
    public function load(ObjectManager $manager)
    {
        $squadRequirementsDatas = array(
            "0" => array(
                'name' => 'crisis_shashui_into_crisis',
                'min' => '3',
                'max' => '9',

            ),
            "1" => array(
                'name' => 'crisis_shavre_into_crisis',
                'min' => '0',
                'max' => '1',

            ),
        );


        foreach ($squadRequirementsDatas as $squadRequirementsData) {
            $squadtype = new squadRequirement();
            $squadtype->setMin($squadRequirementsData['min']);
            $squadtype->setMax($squadRequirementsData['max']);
            $squadtype->setName($squadRequirementsData['name']);


            $manager->persist($squadtype);
            $manager->flush();

            $this->addReference($squadtype->getName(), $squadtype);
        }
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 15;
    }
}