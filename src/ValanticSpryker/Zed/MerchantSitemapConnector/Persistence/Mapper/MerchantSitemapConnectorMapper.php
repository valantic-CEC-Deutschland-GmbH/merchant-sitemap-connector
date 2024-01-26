<?php

declare(strict_types = 1);

namespace ValanticSpryker\Zed\MerchantSitemapConnector\Persistence\Mapper;

use Generated\Shared\Transfer\SitemapUrlNodeTransfer;
use Orm\Zed\Url\Persistence\SpyUrl;
use Propel\Runtime\Collection\ObjectCollection;
use ValanticSpryker\Shared\MerchantSitemapConnector\MerchantSitemapConnectorConstants;
use ValanticSpryker\Zed\MerchantSitemapConnector\MerchantSitemapConnectorConfig;

class MerchantSitemapConnectorMapper implements MerchantSitemapConnectorMapperInterface
{
    /**
     * @var string
     */
    private const URL_FORMAT = '%s%s';

    /**
     * @param \ValanticSpryker\Zed\MerchantSitemapConnector\MerchantSitemapConnectorConfig $config
     */
    public function __construct(
        private MerchantSitemapConnectorConfig $config
    ) {
    }

    /**
     * @param \Propel\Runtime\Collection\ObjectCollection $urlEntities
     *
     * @return array<\Generated\Shared\Transfer\SitemapUrlNodeTransfer>
     */
    public function mapUrlEntitiesToSitemapUrlNodeTransfers(ObjectCollection $urlEntities): array
    {
        $transfers = [];

        foreach ($urlEntities as $urlEntity) {
            $transfers[] = $this->createSitemapUrlNodeTransfer($urlEntity);
        }

        return $transfers;
    }

    /**
     * @param \Orm\Zed\Url\Persistence\SpyUrl $urlEntity
     *
     * @return \Generated\Shared\Transfer\SitemapUrlNodeTransfer
     */
    private function createSitemapUrlNodeTransfer(SpyUrl $urlEntity): SitemapUrlNodeTransfer
    {
        return (new SitemapUrlNodeTransfer())
            ->setUrl($this->formatUrl($urlEntity))
            ->setUpdatedAt($urlEntity->getVirtualColumn('updated_at'))
            ->setResourceId($urlEntity->getFkResourcePage())
            ->setResourceType(MerchantSitemapConnectorConstants::RESOURCE_TYPE);
    }

    /**
     * @param \Orm\Zed\Url\Persistence\SpyUrl $urlEntity
     *
     * @return string
     */
    private function formatUrl(SpyUrl $urlEntity): string
    {
        return sprintf(
            self::URL_FORMAT,
            $this->config->getYvesBaseUrl(),
            $urlEntity->getUrl(),
        );
    }
}
