<?php

namespace App\Repository;

use App\Entity\Poppodium;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
/**
 * @extends ServiceEntityRepository<Poppodium>
 *
 * @method Poppodium|null find($id, $lockMode = null, $lockVersion = null)
 * @method Poppodium|null findOneBy(array $criteria, array $orderBy = null)
 * @method Poppodium[]    findAll()
 * @method Poppodium[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PoppodiumRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Poppodium::class);
    }

    public function createPoppodiums($params, EntityManagerInterface $entityManager){
        $poppodium = new Poppodium();
        $poppodium->setNaam($params["naam"]);
        $poppodium->setAdres($params["adres"]);
        $poppodium->setEmail($params["email"]);
        $poppodium->setPostcode($params["postcode"]);
        $poppodium->setWoonplaats($params["woonplaats"]);
        $poppodium->setTelefoonnummer($params["telefoonnummer"]);
        $poppodium->setWebsite($params["website"]);
        $poppodium->setLogoUrl('https://www.melkweg.nl/wp-content/uploads/2020/03/melkweg-logo-2020.png');
        $poppodium->setAfbeeldingUrl('test');

        $entityManager->persist($poppodium);
        $entityManager->flush();
        return $poppodium;
    }

    public function findByDate(\DateTime $date){
        
        $poppodiums = $this->createQueryBuilder('o')
        ->where('o.datum >= :val')
        ->setParameter('val', $date)
        ->orderBy('o.id', 'ASC')
        ->setMaxResults(10)
        ->getQuery()
        ->getResult();
        return $poppodiums;
    }
    //    /**
    //     * @return Poppodium[] Returns an array of Poppodium objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('p.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Poppodium
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
