<?php

namespace App\Repository;

use App\Entity\Safeplaces;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Safeplaces|null find($id, $lockMode = null, $lockVersion = null)
 * @method Safeplaces|null findOneBy(array $criteria, array $orderBy = null)
 * @method Safeplaces[]    findAll()
 * @method Safeplaces[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SafeplacesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Safeplaces::class);
    }

    // /**
    //  * @return Safeplaces[] Returns an array of Safeplaces objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Safeplaces
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
