<?php

declare(strict_types=1);

namespace App\Repository;

use App\DTO\AcademyFilterRequest;
use App\DTO\ProgramFilterRequest;
use App\Entity\Program;
use App\Enum\ProgramPrice;
use App\Exception\ProgramNotFoundException;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
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

    /**
     * @throws ProgramNotFoundException
     */
    public function getById(string $id): Program
    {
        $program = $this->find($id);

        if ($program instanceof Program) {
            return $program;
        }

        throw new ProgramNotFoundException(\sprintf('Program with id %s does not exist', $id));
    }

    public function findByCategory(string $category): array
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
    public function findByFilters(ProgramFilterRequest $filterRequest): array
    {
        $query = $this->createQueryBuilder('program');

        if ($filterRequest->getSlug() !== null) {
            $query
                ->andWhere('program.programCategory = :category')
                ->setParameter('category', $filterRequest->getSlug());
        }

        if ($filterRequest->getCity() !== null) {
            $query
                ->andWhere('program.city = :city')
                ->setParameter('city', $filterRequest->getCity());
        }

        if ($filterRequest->getProgram() !== null) {
            $query->andWhere('program.title = :title');
            $query->setParameter('title', $filterRequest->getProgram());
        }

        $result = $this->addQueryByPrice($query, (string)$filterRequest->getPrice())
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
    public function findByAcademySlugAndFilters(AcademyFilterRequest $filterRequest): array
    {
        $query = $this->createQueryBuilder('program')
            ->innerJoin('program.academy', 'pa')
            ->andWhere('pa.slug = :academySlug')
            ->setParameter('academySlug', $filterRequest->getSlug());

        if ($filterRequest->getCity() !== null) {
            $query
                ->andWhere('program.city = :city')
                ->setParameter('city', $filterRequest->getCity());
        }

        if ($filterRequest->getProgram() !== null) {
            $query->andWhere('program.programCategory = :category');
            $query->setParameter('category', $filterRequest->getProgram());
        }

        $result = $this->addQueryByPrice($query, (string)$filterRequest->getPrice())
            ->getQuery()
            ->getResult();

        return $result ?? [];
    }

    private function addQueryByPrice(QueryBuilder $query, string $price): QueryBuilder
    {
        if ($price === '1') {
            return $query->andWhere(\sprintf('program.price < %s', ProgramPrice::MIN));
        }

        if ($price === '2') {
            return $query->andWhere(\sprintf('program.price < %s', ProgramPrice::MAX));
        }

        if ($price === '3') {
            return $query->andWhere(\sprintf('program.price > %s', ProgramPrice::MAX));
        }

        return $query->andWhere(\sprintf('program.price = %s', ProgramPrice::FREE));
    }
}
