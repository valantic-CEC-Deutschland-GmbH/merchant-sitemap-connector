<?php

declare(strict_types = 1);

namespace ValanticSpryker\Zed\MerchantSitemapConnector\Business;

use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use Spryker\Zed\Store\Business\StoreFacadeInterface;
use ValanticSpryker\Service\Sitemap\SitemapServiceInterface;
use ValanticSpryker\Zed\CategorySitemapConnector\CategorySitemapConnectorDependencyProvider;
use ValanticSpryker\Zed\MerchantSitemapConnector\Business\Model\MerchantSitemapCreator;
use ValanticSpryker\Zed\MerchantSitemapConnector\Business\Model\MerchantSitemapCreatorInterface;

/**
 * @method \ValanticSpryker\Zed\MerchantSitemapConnector\MerchantSitemapConnectorConfig getConfig()
 * @method \ValanticSpryker\Zed\MerchantSitemapConnector\Persistence\MerchantSitemapConnectorRepositoryInterface getRepository()
 */
class MerchantSitemapConnectorBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \ValanticSpryker\Zed\MerchantSitemapConnector\Business\Model\MerchantSitemapCreatorInterface
     */
    public function createMerchantSitemapCreator(): MerchantSitemapCreatorInterface
    {
        return new MerchantSitemapCreator(
            $this->getSitemapService(),
            $this->getStoreFacade(),
            $this->getConfig(),
            $this->getRepository(),
        );
    }

    /**
     * @return \ValanticSpryker\Service\Sitemap\SitemapServiceInterface
     */
    private function getSitemapService(): SitemapServiceInterface
    {
        return $this->getProvidedDependency(CategorySitemapConnectorDependencyProvider::SERVICE_SITEMAP);
    }

    /**
     * @return \Spryker\Zed\Store\Business\StoreFacadeInterface
     */
    private function getStoreFacade(): StoreFacadeInterface
    {
        return $this->getProvidedDependency(CategorySitemapConnectorDependencyProvider::FACADE_STORE);
    }
}
