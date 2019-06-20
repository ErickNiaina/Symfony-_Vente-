<?php

namespace ChaussureBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

/**
 * ChaussureRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ChaussureRepository extends \Doctrine\ORM\EntityRepository
{
    public function Recherche($libelle)
    {
      $qb = $this->createQueryBuilder('c');
      $qb->where('c.libelle LIKE :libelle')
          ->setParameter('libelle', '%'.$libelle.'%');
      return $qb->getQuery()
                ->getResult();
    }

    public function findArray($array)
    {
        $qb = $this->createQueryBuilder('c')
                    ->select('c')
                    ->Where('c.id IN (:array)')
                    ->setParameter('array', $array);
                    
    return $qb->getQuery()->getResult();
    }

    public function Prix($prix)
    {
      $qb = $this->createQueryBuilder('c');
      $qb->where('c.prix < :prix')
        ->setParameter('prix', $prix);
      return $qb->getQuery()
                ->getResult();
    }
}
