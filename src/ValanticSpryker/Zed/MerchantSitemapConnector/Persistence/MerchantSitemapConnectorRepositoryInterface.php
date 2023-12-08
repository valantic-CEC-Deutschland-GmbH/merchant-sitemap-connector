<?php

declare(strict_types = 1);

namespace ValanticSpryker\Zed\MerchantSitemapConnector\Persistence;

use Generated\Shared\Transfer\StoreTransfer;

interface MerchantSitemapConnectorRepositoryInterface
{
    /**
     * @param \Generated\Shared\Transfer\StoreTransfer $storeTransfer
     * @param int $page
     * @param int $pageLimit
     *
     * @return array<\Generated\Shared\Transfer\SitemapUrlTransfer>
     */
    public function findActiveMerchants(StoreTransfer $storeTransfer, int $page, int $pageLimit): array;
}
