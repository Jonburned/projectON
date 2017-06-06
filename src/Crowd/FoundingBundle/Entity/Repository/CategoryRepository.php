<?php

namespace Crowd\FoundingBundle\Entity\Repository;

class CategoryRepository extends \Doctrine\ORM\EntityRepository
{
    public function getAll()
    {
        $qb = $this->createQueryBuilder('c')
            ->select('c', 'p', 'd')
            ->leftJoin('c.projects', 'p')
            ->leftJoin('p.donates', 'd')
            ->orderBy('p.endDate', 'DESC');

        return $qb->getQuery()->getResult();
    }
}