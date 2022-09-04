<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Program;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Program[] findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 * @method Program|null findOneBy(array $criteria, array $orderBy = null)
 * @method Program[] findAll()
 */
class ProgramRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Program::class);
    }

    public function getById(string $id): Program
    {
        return $this->find($id);
    }

    public function findByCategory(string $category)
    {
        return $this->createQueryBuilder('program')
            ->where('program.programCategory = :category')
            ->setParameter('category', $category)
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Program[]
     */
    public function findByFilters(
        ?string $title,
        string $city,
        string $price,
        string $slug
    ): array {
        $query = $this->createQueryBuilder('program');

        $query
            ->andWhere('program.programCategory = :category')
            ->andWhere('program.city = :city')
            ->setParameters([
                'category' => $slug,
                'city' => $city,
            ]);

        if ($title !== null) {
            $query->andWhere('program.title = :title');
            $query->setParameter('title', $title);
        }

        if ($price === '1') {
            $query->andWhere('program.price < 500');
        } elseif ($price === '2') {
            $query->andWhere('program.price < 1000');
        } elseif ($price === '3') {
            $query->andWhere('program.price > 1000');
        } else {
            $query->andWhere('program.price = 0');
        }

        $result = $query
            ->getQuery()
            ->getResult();

        return $result ?? [];
    }

    /**
     * @return Program[]
     */
    public function findByAcademySlug(string $academySlug): array
    {
        return $this->createQueryBuilder('program')
            ->innerJoin('program.academy', 'pa')
            ->andWhere('pa.slug = :academySlug')
            ->setParameter('academySlug', $academySlug)
            ->getQuery()->getResult();
    }

    /**
     * @return Program[]
     */
    public function findByAcademySlugAndFilters(
        string $slug,
        string $category,
        string $city,
        string $price
    ): array {
        $query = $this->createQueryBuilder('program')
            ->innerJoin('program.academy', 'pa')
            ->andWhere('pa.slug = :academySlug')
            ->andWhere('program.programCategory = :category')
            ->andWhere('program.city = :city');

        if ($price === '1') {
            $query->andWhere('program.price < 500');
        } elseif ($price === '2') {
            $query->andWhere('program.price < 1000');
        } elseif ($price === '3') {
            $query->andWhere('program.price > 1000');
        } else {
            $query->andWhere('program.price = 0');
        }

        $result = $query
            ->setParameters([
                'academySlug' => $slug,
                'category' => $category,
                'city' => $city,
            ])
            ->getQuery()
            ->getResult();

        return $result ?? [];
    }
}
