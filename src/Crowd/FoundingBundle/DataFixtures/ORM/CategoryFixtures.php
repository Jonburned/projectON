<?php

namespace Crowd\FoundingBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Crowd\FoundingBundle\Entity\Category;

class CategoryFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $category1 = new Category();
        $category1->setName("Економіка");
        $manager->persist($category1);

        $category2 = new Category();
        $category2->setName("Література");
        $manager->persist($category2);

        $category3 = new Category();
        $category3->setName("Музика");
        $manager->persist($category3);

        $category4 = new Category();
        $category4->setName("Відео");
        $manager->persist($category4);

        $category5 = new Category();
        $category5->setName("Мистецтво");
        $manager->persist($category5);

        $manager->flush();

        $this->addReference('category1', $category1);
        $this->addReference('category2', $category2);
        $this->addReference('category3', $category3);
        $this->addReference('category4', $category4);
        $this->addReference('category5', $category5);
    }
    public function getOrder()
    {
        return 1;
    }
}