<?php

    
namespace Bakkerij\Bundle\Repository;
use Doctrine\ORM\EntityRepository;
  
class BestellingRepository extends EntityRepository {
    
        
    public function byFacturefind($users)
    {
        
      $qb = $this->createQueryBuilder('u')
              ->select('u')
              ->where('u.users = :users')
              ->andWhere('u.valider = 1')
              ->andWhere('u.reference != 0')
              ->orderBy('u.id')
              ->setParameter('users',$users);
              
              return $qb->getQuery()->getResult();
    }
    

   
}
