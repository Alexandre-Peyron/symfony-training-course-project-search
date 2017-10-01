<?php
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Brand;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class BrandFixtures extends Fixture
{
    /**
     * Load fixtures Brand
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $brand1 = new Brand();
        $brand1->setName('HB');
        $brand1->setDescription('Marque HB');
        $manager->persist($brand1);
        $this->addReference('brand-hb', $brand1);

        $brand2 = new Brand();
        $brand2->setName('Azus');
        $brand2->setDescription('Marque Azus');
        $manager->persist($brand2);
        $this->addReference('brand-azus', $brand2);

        $brand3 = new Brand();
        $brand3->setName('Pomme');
        $brand3->setDescription('Marque Pomme');
        $manager->persist($brand3);
        $this->addReference('brand-pomme', $brand3);

        $brand4 = new Brand();
        $brand4->setName('Same Soug');
        $brand4->setDescription('Marque Same Soug');
        $manager->persist($brand4);
        $this->addReference('brand-samesoug', $brand4);

        $brand5 = new Brand();
        $brand5->setName('HacheThéCay');
        $brand5->setDescription('Marque HacheThéCay');
        $manager->persist($brand5);
        $this->addReference('brand-hachethecay', $brand5);

        $manager->flush();
    }
}
