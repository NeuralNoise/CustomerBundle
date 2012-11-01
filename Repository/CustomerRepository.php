<?php

namespace TerraMar\Bundle\CustomerBundle\Repository;

use Doctrine\ORM\EntityRepository;

class CustomerRepository extends EntityRepository
{
    public function findRecent()
    {
        return $this->createQueryBuilder('c')
            ->where('c.active = true')
            ->orderBy('c.dateCreated')
            ->setMaxResults(50);
    }
}
