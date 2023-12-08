<?php

declare(strict_types = 1);

namespace ValanticSpryker\Zed\MerchantSitemapConnector\Business\Model;

use Spryker\Zed\Store\Business\StoreFacadeInterface;
use ValanticSpryker\Service\Sitemap\SitemapServiceInterface;
use ValanticSpryker\Shared\MerchantSitemapConnector\MerchantSitemapConnectorConstants;
use ValanticSpryker\Zed\MerchantSitemapConnector\MerchantSitemapConnectorConfig;
use ValanticSpryker\Zed\MerchantSitemapConnector\Persistence\MerchantSitemapConnectorRepositoryInterface;

class MerchantSitemapCreator implements MerchantSitemapCreatorInterface
{
    /**
     * @param \ValanticSpryker\Service\Sitemap\SitemapServiceInterface $sitemapService
     * @param \Spryker\Zed\Store\Business\StoreFacadeInterface $storeFacade
     * @param \ValanticSpryker\Zed\MerchantSitemapConnector\MerchantSitemapConnectorConfig $config
     * @param \ValanticSpryker\Zed\MerchantSitemapConnector\Persistence\MerchantSitemapConnectorRepositoryInterface $repository
     */
    public function __construct(
        private SitemapServiceInterface $sitemapService,
        private StoreFacadeInterface $storeFacade,
        private MerchantSitemapConnectorConfig $config,
        private MerchantSitemapConnectorRepositoryInterface $repository
    ) {
    }

    /**
     * @return array<\Generated\Shared\Transfer\SitemapFileTransfer>
     */
    public function createMerchantSitemapXml(): array
    {
        $pageLimit = $this->config->getSitemapUrlLimit();
        $sitemapList = [];
        $currentStoreTransfer = $this->storeFacade->getCurrentStore();
        $page = 1;

        do {
            $urlList = $this->repository->findActiveMerchants(
                $currentStoreTransfer,
                $page,
                $pageLimit,
            );

            $sitemapTransfer = $this->sitemapService->createSitemapXmlFileTransfer(
                $urlList,
                $page,
                $currentStoreTransfer->getName(),
                MerchantSitemapConnectorConstants::RESOURCE_TYPE,
            );

            if ($sitemapTransfer !== null) {
                $sitemapList[] = $sitemapTransfer;
            }

            $page++;
        } while ($sitemapTransfer !== null);

        return $sitemapList;
    }
}
