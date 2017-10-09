<?php

namespace AppBundle\Repository;

use AppBundle\Enum\ProductSearchCriteria as Criteria;

/**
 * ProductRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProductRepository extends \Doctrine\ORM\EntityRepository
{

    /**
     * Filter all products by criteria
     *
     * @param $criteria
     * @return array
     */
    public function filterByAllCriteria($criteria)
    {
        $queryBuilder = $this->createQueryBuilder('p');

        $queryBuilder->where('p.isEnabled = 1');

        if (isset($criteria[Criteria::SEARCH]) && !empty($criteria[Criteria::SEARCH])) {
            $queryBuilder->andWhere(
                $queryBuilder->expr()->orX(
                    $queryBuilder->expr()->like('p.name', ':search'),
                    $queryBuilder->expr()->like('p.description', ':search'),
                    $queryBuilder->expr()->like('p.reference', ':search')
                ))
                ->setParameter('search', '%' . $criteria[Criteria::SEARCH] . '%');
        }

        if (isset($criteria[Criteria::PRICE_MIN]) && !empty($criteria[Criteria::PRICE_MIN])) {
            $queryBuilder
                ->andWhere('p.price >= :priceMin')
                ->setParameter('priceMin', $criteria[Criteria::PRICE_MIN]);
        }

        if (isset($criteria[Criteria::PRICE_MAX]) && !empty($criteria[Criteria::PRICE_MAX])) {
            $queryBuilder
                ->andWhere('p.price <= :priceMax')
                ->setParameter('priceMax', $criteria[Criteria::PRICE_MAX]);
        }

        if (isset($criteria[Criteria::NOTE])) {
            $queryBuilder
                ->andWhere('p.note >= :note')
                ->setParameter('note', $criteria[Criteria::NOTE]);
        }

        if (isset($criteria[Criteria::PREMIUM])) {
            $queryBuilder->andWhere('p.isPremium = :isPremium')
                ->setParameter('isPremium', $criteria[Criteria::PREMIUM]);
        }

        if (isset($criteria[Criteria::TYPE]) && !empty($criteria[Criteria::TYPE])) {
            $queryBuilder
                ->leftJoin('p.type', 't')
                ->andWhere('t.id = :typeId')
                ->setParameter('typeId', $criteria[Criteria::TYPE]);
        }

        if (isset($criteria[Criteria::BRAND]) && !empty($criteria[Criteria::BRAND])) {
            $queryBuilder
                ->leftJoin('p.brand', 'b')
                ->andWhere('b.id = :brandId')
                ->setParameter('brandId', $criteria[Criteria::BRAND]);
        }

        return $queryBuilder->getQuery()->getResult();
    }


}
