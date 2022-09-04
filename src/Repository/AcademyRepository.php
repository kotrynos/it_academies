<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Academy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Academy[] findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 * @method Academy|null findOneBy(array $criteria, array $orderBy = null)
 * @method Academy[] findAll()
 */
class AcademyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Academy::class);
    }

    public function getBySlug(string $slug): Academy
    {
        return $this->createQueryBuilder('academy')
            ->where('academy.slug = :slug')
            ->setParameter('slug', $slug)
            ->getQuery()
            ->getSingleResult();
    }
}
