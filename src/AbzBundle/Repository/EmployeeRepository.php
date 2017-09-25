<?php

namespace AbzBundle\Repository;

use Doctrine\ORM\EntityRepository;

class EmployeeRepository extends EntityRepository
{
    public function getAllQuery()
    {
        $query = $this->getEntityManager()
            ->createQuery('SELECT e FROM AbzBundle:Employee e');

        return $query;
    }

    public function getAllByBossQuery($boss_id)
    {
        $query = $this->getEntityManager()
            ->createQuery('SELECT e FROM AbzBundle:Employee e
                           WHERE e.boss_id = :boss_id')
            ->setParameter('boss_id', $boss_id);

        return $query;
    }
}
