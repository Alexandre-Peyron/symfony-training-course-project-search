<?php
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Type;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class TypeFixtures extends Fixture
{
    /**
     * Load fixtures Type
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $type1 = new Type();
        $type1->setName('Ordinateurs');
        $type1->setDescription('Multimédia - Ordinateur');
        $manager->persist($type1);
        $this->setReference('type-ordi', $type1);

        $type2 = new Type();
        $type2->setName('Tablettes');
        $type2->setDescription('Multimédia - Tablettes');
        $manager->persist($type2);
        $this->setReference('type-tablette', $type2);

        $type3 = new Type();
        $type3->setName('SmartPhones');
        $type3->setDescription('Multimédia - SmartPhone');
        $manager->persist($type3);
        $this->setReference('type-smartphone', $type3);

        $manager->flush();
    }
}
