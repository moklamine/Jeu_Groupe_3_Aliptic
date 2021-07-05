<?php

namespace App\Repository;

use App\Entity\Ennemy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Ennemy|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ennemy|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ennemy[]    findAll()
 * @method Ennemy[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EnnemyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ennemy::class);
    }

    // /**
    //  * @return Ennemy[] Returns an array of Ennemy objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ennemy
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
