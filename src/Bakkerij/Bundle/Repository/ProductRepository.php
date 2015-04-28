<?php

namespace Bakkerij\Bundle\Repository;

use Doctrine\ORM\EntityRepository;

class ProductRepository extends EntityRepository {

    public function recherche($chaine) {
        $qb = $this->createQueryBuilder('u')
                ->select('u')
                ->where('u.naam like :chaine')
                ->andWhere('u.disponible=1')
                ->orderBy('u.id')
                ->setParameter('chaine', $chaine);
        return $qb->getQuery()->getResult();
    }

    public function findArray($array) {
        $qb = $this->createQueryBuilder('u')
                ->select('u')
                ->where('u.id IN (:array) ')
                ->orderBy('u.id')
                ->setParameter('array', $array);
        return $qb->getQuery()->getResult();
    }

}
