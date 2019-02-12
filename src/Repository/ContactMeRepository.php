<?php

namespace App\Repository;

use App\Entity\ContactMe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ContactMe|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContactMe|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContactMe[]    findAll()
 * @method ContactMe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContactMeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ContactMe::class);
    }

    // /**
    //  * @return ContactMe[] Returns an array of ContactMe objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ContactMe
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
