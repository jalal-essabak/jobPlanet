<?php

namespace App\Repository;

use App\Entity\Job;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Job|null find($id, $lockMode = null, $lockVersion = null)
 * @method Job|null findOneBy(array $criteria, array $orderBy = null)
 * @method Job[]    findAll()
 * @method Job[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JobRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Job::class);
    }

    // /**
    //  * @return Job[] Returns an array of Job objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    
    public function findAllJobs($value1,$value2)
    {
        return $this->createQueryBuilder('j')
            ->Where('j.job_title like :val1')
            ->AndWhere('j.location like :val2')
            ->AndWhere('j.confirmation = :val')
            ->setParameter('val1', '%'.$value1.'%')
            ->setParameter('val2', '%'.$value2.'%')
            ->setParameter('val', 1)
            ->getQuery()
            ->getResult();
    }

    public function finddetail($value)
    {
        return $this->createQueryBuilder('j')
            ->Where('j.id like :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getSingleResult()
        ;
    }
    /**
      * @return Job[] Returns an array of Job objects
    */
    
    public function findNonConfirmedJobs()
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.confirmation = :val')
            ->setParameter('val', 0)
            ->orderBy('j.id', 'ASC')
            ->getQuery()
            ->getResult();
    }
     
}
