<?php

declare(strict_types = 1);

namespace ValanticSpryker\Zed\MerchantSitemapConnector\Persistence;

use Orm\Zed\Url\Persistence\SpyUrlQuery;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;
use ValanticSpryker\Zed\MerchantSitemapConnector\Persistence\Mapper\MerchantSitemapConnectorMapper;
use ValanticSpryker\Zed\MerchantSitemapConnector\Persistence\Mapper\MerchantSitemapConnectorMapperInterface;

/**
 * @method \ValanticSpryker\Zed\MerchantSitemapConnector\MerchantSitemapConnectorConfig getConfig()
 */
class MerchantSitemapConnectorPersistenceFactory extends AbstractPersistenceFactory
{
    /**
     * @return \Orm\Zed\Url\Persistence\SpyUrlQuery
     */
    public function createSpyUrlQuery(): SpyUrlQuery
    {
        return SpyUrlQuery::create();
    }

    /**
     * @return \ValanticSpryker\Zed\MerchantSitemapConnector\Persistence\Mapper\MerchantSitemapConnectorMapperInterface
     */
    public function createMerchantSitemapMapper(): MerchantSitemapConnectorMapperInterface
    {
        return new MerchantSitemapConnectorMapper(
            $this->getConfig(),
        );
    }
}
