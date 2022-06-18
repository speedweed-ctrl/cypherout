<?php

namespace App\Repository;

use App\Entity\Gichet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Gichet|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gichet|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gichet[]    findAll()
 * @method Gichet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GichetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Gichet::class);
    }

    // /**
    //  * @return Gichet[] Returns an array of Gichet objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Gichet
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
