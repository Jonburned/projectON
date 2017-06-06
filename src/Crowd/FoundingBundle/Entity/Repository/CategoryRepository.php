<?php

namespace Crowd\FoundingBundle\Entity\Repository;

class CategoryRepository extends \Doctrine\ORM\EntityRepository
{
    public function getAll()
    {
        $qb = $this->createQueryBuilder('c')
            ->select('c', 'p')
            ->leftJoin('c.projects', 'p');

        return $qb->getQuery()->getResult();
    }
}