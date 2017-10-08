<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class ScriptRepository extends EntityRepository
{
    public function findAllOrderedBySerialNumber() {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT s FROM App:Script s ORDER BY s.serial_number DESC'
            )
            ->getResult();
    }
}
