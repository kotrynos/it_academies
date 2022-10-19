<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Academy;
use App\Exception\AcademyNotFoundException;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
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

    /**
     * @throws AcademyNotFoundException
     */
    public function getBySlug(string $slug): Academy
    {
        try {
            return $this->createQueryBuilder('academy')
                ->where('academy.slug = :slug')
                ->setParameter('slug', $slug)
                ->getQuery()
                ->getSingleResult();
        } catch (NoResultException | NonUniqueResultException) {
            throw new AcademyNotFoundException(\sprintf('Academy by slug %s not found', $slug));
        }
    }
}
