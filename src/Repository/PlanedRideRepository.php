<?php

namespace App\Repository;

use App\Entity\PlanedRide;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method PlanedRide|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlanedRide|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlanedRide[]    findAll()
 * @method PlanedRide[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlanedRideRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlanedRide::class);
    }

    // /**
    //  * @return PlanedRide[] Returns an array of PlanedRide objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PlanedRide
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
