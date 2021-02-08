<?php

namespace App\Repository;

use App\Entity\Prato;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Prato|null find($id, $lockMode = null, $lockVersion = null)
 * @method Prato|null findOneBy(array $criteria, array $orderBy = null)
 * @method Prato[]    findAll()
 * @method Prato[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PratoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Prato::class);
    }

    // /**
    //  * @return Prato[] Returns an array of Prato objects
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
    public function findOneBySomeField($value): ?Prato
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
