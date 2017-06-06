<?php
namespace Crowd\FoundingBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Crowd\FoundingBundle\Entity\Project;

class ProjectFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $project1 = new Project();
        $project1->setName("Гартівня нащадків козацького роду");
    }
    public function getOrder()
    {
        return 1;
    }
}