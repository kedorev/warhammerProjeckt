<?php
/**
 * Created by PhpStorm.
 * User: lerm
 * Date: 19/06/2017
 * Time: 10:38
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MainAppBundle\Entity\Models;
use MainAppBundle\Entity\Profil;

class LoadModelsData extends AbstractFixture implements OrderedFixtureInterface

{
    public function load(ObjectManager $manager)
    {
        $modelsData = array(
            "0" => array(
                'Name' => "Breacher team",
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
            ),
            "1" => array(
                'Name' => "Crisis",
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
                )
            ),
        );


        foreach($modelsData as $modelData)
        {
            $model = new Models();
            $model->setName($modelData['Name']);
            $model->setWound($modelData['Wound']);
            $model->setSave($modelData['Save']);
            $model->setPoint($modelData['Point']);
            $model->setToughness($modelData['Toughness']);
            $model->setLeadership($modelData['Ld']);
            $model->setPower($modelData['PP']);
            $profilsData = $modelData['profil'];
            foreach($profilsData as $profilData)
            {
                $profil = new Profil();
                $profil->setAttack($profilData['A']);
                $profil->setBS($profilData['CC']);
                $profil->setMinWound($profilData['min']);
                $profil->setMaxWound($profilData['max']);
                $profil->setMove($profilData['M']);
                $profil->setWS($profilData['CT']);
                $profil->setStrength($profilData['F']);
                $model->addProfil($profil);
                $manager->persist($profil);
            }
            foreach($modelData['weapon'] as $weapon)
            {
                $model->addWeapon($this->getReference($weapon));
            }
            $manager->persist($model);
            $manager->flush();

            $this->addReference($model->getName(), $model);
        }
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 10;
    }
}