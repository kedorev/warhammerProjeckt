<?php
/**
 * Created by PhpStorm.
 * User: lerm
 * Date: 13/07/2017
 * Time: 13:44
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MainAppBundle\Entity\Squad;

class LoadSquadData extends AbstractFixture implements OrderedFixtureInterface

{
    public function load(ObjectManager $manager)
    {
        /*$modelsData = array(
            "0" => array(
                'Name' => "Striker team",
                'Wound' => 1,
                'Save' => 4,
                'Point' => 8,
                'Toughness' => 3,
                'Ld' => 7,
                'PP' => 4,
                'profil' => array(
                    '0' => array(
                        'CC' => 5,
                        'CT' => 4,
                        'F' => 3,
                        'A' => 1,
                        'M' => 6,
                        'min' => 1,
                        'max' => 1,
                    ),
                ),
                'weapon' => array(
                    '0' => "Fusil a impulsion",
                ),
                'keyword' => array(

                ),
                'faction' => array(
                    '0' => 'Tau',
                ),
                'abilities' => array(

                ),
            ),
            "1" => array(
                'Name' => "Crisis sha'shui",
                'Wound' => 3,
                'Save' => 3,
                'Point' => 42,
                'Toughness' => 5,
                'Ld' => 7,
                'PP' => 4,
                'profil' => array(
                    '0' => array(
                        'CC' => 5,
                        'CT' => 4,
                        'F' => 5,
                        'A' => 2,
                        'M' => 8,
                        'min' => 1,
                        'max' => 3,
                    )
                ),
                'weapon' => array(
                    '0' => "Fusil a plasma",
                ),
                'keyword' => array(
                    '0' => "Vol",
                    '1' => "Battlesuit",
                ),
                'faction' => array(
                    '0' => 'Tau',
                ),
                'abilities' => array(
                    '0' => 'Manta Strike',
                ),
            ),
            "2" => array(
                'Name' => "Crisis sha'vre",
                'Wound' => 3,
                'Save' => 3,
                'Point' => 42,
                'Toughness' => 5,
                'Ld' => 8,
                'PP' => 4,
                'profil' => array(
                    '0' => array(
                        'CC' => 5,
                        'CT' => 4,
                        'F' => 5,
                        'A' => 3,
                        'M' => 8,
                        'min' => 1,
                        'max' => 3,
                    )
                ),
                'weapon' => array(
                    '0' => "Fusil a plasma",
                ),
                'keyword' => array(
                    '0' => "Vol",
                    '1' => "Battlesuit",
                ),
                'faction' => array(
                    '0' => 'Tau',
                ),
                'abilities' => array(
                    '0' => 'Manta Strike',
                ),
            ),
        );*/

        $squadsData = array(
            '0' => array(
                'name' => 'XV8 crisis',
                'type' => 'Elite',
                'requirement' => array(
                    '0' => 'crisis_shashui_into_crisis',
                    '1' => 'crisis_shavre_into_crisis',
                ),
                'min' => '3',
                'max' => '9',
            )
        );


        foreach($squadsData as $squadData)
        {
            $squad = new Squad();
            $squad->setName($squadData['name']);
            $squad->setType($this->getReference($squadData['type']));
            $squad->setMin($squadData['min']);
            $squad->setMax($squadData['max']);

            $manager->persist($squad);
            $manager->flush();

            $this->addReference($squad->getName(), $squad);
        }
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 15;
    }
}