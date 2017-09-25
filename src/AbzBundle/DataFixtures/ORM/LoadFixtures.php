<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Nelmio\Alice\Loader\NativeLoader;

class LoadFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $loader = new NativeLoader();

        // fixtures > 1000 generation is very slow, hack to get 50k
        for ($i = 1; $i <= 50; $i++) {
            $objectSet = $loader->loadFile(__DIR__.'/fixtures.yml');

            foreach ($objectSet->getObjects() as $obj) {
                $manager->persist($obj);
            }
            echo $i * 1000 . " entries generated.\n";
            $manager->flush();
            $manager->clear();
        }

    }
}
