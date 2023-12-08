<?php

declare(strict_types = 1);

namespace ValanticSpryker\Zed\MerchantSitemapConnector\Persistence\Mapper;

use Propel\Runtime\Collection\ObjectCollection;

interface MerchantSitemapConnectorMapperInterface
{
    /**
     * @param \Propel\Runtime\Collection\ObjectCollection<\Orm\Zed\Url\Persistence\SpyUrl> $urlEntities
     *
     * @return array<\Generated\Shared\Transfer\SitemapUrlTransfer>
     */
    public function mapUrlEntitiesToSitemapUrlTransfers(ObjectCollection $urlEntities): array;
}
