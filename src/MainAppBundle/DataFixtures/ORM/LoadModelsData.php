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
            ),
            "1" => array(
                'Name' => "Crisis",
                'Wound' => 3,
                'Save' => 3,
                'Point' => 42,
                'Toughness' => 5,
                'Ld' => 7,
                'PP' => 4,
                'profils' => array(
                    'CC' => 5,
                    'CT' => 4,
                    'F' => 5,
                    'A' => 2,
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