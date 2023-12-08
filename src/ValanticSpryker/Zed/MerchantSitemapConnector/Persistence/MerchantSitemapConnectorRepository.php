<?php

declare(strict_types = 1);

namespace ValanticSpryker\Zed\MerchantSitemapConnector\Persistence;

use Generated\Shared\Transfer\StoreTransfer;
use Orm\Zed\Url\Persistence\Map\SpyUrlTableMap;
use Orm\Zed\UrlStorage\Persistence\Map\SpyUrlStorageTableMap;
use Propel\Runtime\ActiveQuery\Criteria;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;

/**
 * @method \ValanticSpryker\Zed\MerchantSitemapConnector\Persistence\MerchantSitemapConnectorPersistenceFactory getFactory()
 */
class MerchantSitemapConnectorRepository extends AbstractRepository implements MerchantSitemapConnectorRepositoryInterface
{
    /**
     * @param \Generated\Shared\Transfer\StoreTransfer $storeTransfer
     * @param int $page
     * @param int $pageLimit
     *
     * @return array<\Generated\Shared\Transfer\SitemapUrlTransfer>
     */
    public function findActiveMerchants(StoreTransfer $storeTransfer, int $page, int $pageLimit): array
    {
        $query = $this->getFactory()
            ->createSpyUrlQuery()
            ->filterByFkResourceMerchant(comparison: Criteria::ISNOTNULL)
            ->filterByFkResourceRedirect(comparison: Criteria::ISNULL)
            ->useSpyLocaleQuery()
                ->useLocaleStoreQuery()
                    ->filterByFkStore($storeTransfer->getIdStore())
                ->endUse()
            ->endUse()
            ->useSpyMerchantQuery()
                ->useSpyMerchantStoreQuery()
                    ->filterByFkStore($storeTransfer->getIdStore())
                ->endUse()
            ->endUse()
            ->addJoin(SpyUrlTableMap::COL_ID_URL, SpyUrlStorageTableMap::COL_FK_URL, Criteria::INNER_JOIN)
           ->withColumn(SpyUrlStorageTableMap::COL_UPDATED_AT, 'updated_at')
           ->setOffset($this->calculateOffsetByPage($page, $pageLimit))
           ->setLimit($pageLimit);

        return $this->getFactory()
            ->createMerchantSitemapMapper()
            ->mapUrlEntitiesToSitemapUrlTransfers($query->find());
    }

    /**
     * @param int $page
     * @param int $pageLimit
     *
     * @return int
     */
    private function calculateOffsetByPage(int $page, int $pageLimit): int
    {
        return ($page - 1) * $pageLimit;
    }
}
