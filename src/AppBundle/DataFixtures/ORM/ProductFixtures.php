<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    /**
     * Load Fixtures Product
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $p1 = new Product();
        $p1->setReference('#20170930ABC2');
        $p1->setName('RaiihPhone 8');
        $p1->setDescription('Ceci est une révolution');
        $p1->setIsEnabled(true);
        $p1->setIsPremium(true);
        $p1->setPrice(1300);
        $p1->setNote(5);
        $p1->setCreatedAt(new \DateTime('now'));
        $p1->setUpdatedAt(new \DateTime('now+1'));
        $p1->setType($this->getReference('type-smartphone'));
        $p1->setBrand($this->getReference('brand-pomme'));
        $manager->persist($p1);

        $p2 = new Product();
        $p2->setReference('#20170930ABC321');
        $p2->setName('UlulTra');
        $p2->setDescription('Ceci est peut être une révolution');
        $p2->setIsEnabled(true);
        $p2->setIsPremium(false);
        $p2->setPrice(800);
        $p2->setNote(4);
        $p2->setCreatedAt(new \DateTime('now'));
        $p2->setUpdatedAt(new \DateTime('now+1'));
        $p2->setType($this->getReference('type-smartphone'));
        $p2->setBrand($this->getReference('brand-hachethecay'));
        $manager->persist($p2);

        $p3 = new Product();
        $p3->setReference('#JKDSLKJZIJIDJ');
        $p3->setName('Azus PC Gamer');
        $p3->setDescription('For the Gamers');
        $p3->setIsEnabled(true);
        $p3->setIsPremium(true);
        $p3->setPrice(2200);
        $p3->setNote(5);
        $p3->setCreatedAt(new \DateTime('now'));
        $p3->setUpdatedAt(new \DateTime('now+1'));
        $p3->setType($this->getReference('type-ordi'));
        $p3->setBrand($this->getReference('brand-azus'));
        $manager->persist($p3);

        $p4 = new Product();
        $p4->setReference('#3239J90OKL?DI2O');
        $p4->setName('Galax Note 8');
        $p4->setDescription('From Corea');
        $p4->setIsEnabled(true);
        $p4->setIsPremium(false);
        $p4->setPrice(500);
        $p4->setNote(3);
        $p4->setCreatedAt(new \DateTime('now'));
        $p4->setUpdatedAt(new \DateTime('now+1'));
        $p4->setType($this->getReference('type-tablette'));
        $p4->setBrand($this->getReference('brand-samesoug'));
        $manager->persist($p4);


        $types = ['type-ordi', 'type-tablette', 'type-smartphone'];
        $brands = ['brand-hb', 'brand-azus', 'brand-pomme', 'brand-samesoug', 'brand-hachethecay'];

        for ($i = 0; $i < 20; $i++) {
            $pSample = new Product();
            $pSample->setReference('#SAMPLE' . $i . $i . $i);
            $pSample->setName('Sample ' . $i);
            $pSample->setDescription('"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');
            $pSample->setIsEnabled(true);
            $pSample->setIsPremium(false);
            $pSample->setPrice(rand(10, $i * 100));
            $pSample->setNote(rand(0, 5));
            $pSample->setCreatedAt(new \DateTime('now'));
            $pSample->setUpdatedAt(new \DateTime('now+1'));
            $pSample->setType($this->getReference($types[rand(0, count($types) - 1)]));
            $pSample->setBrand($this->getReference($brands[rand(0, count($brands) - 1)]));
            $manager->persist($pSample);
        }


        $manager->flush();
    }

    /**
     * Set fixtures dependencies
     *
     * @return array
     */
    public function getDependencies()
    {
        return [
            TypeFixtures::class,
            BrandFixtures::class
        ];
    }
}
