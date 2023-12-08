<?php

declare(strict_types = 1);

namespace ValanticSpryker\Zed\MerchantSitemapConnector\Communication\Plugin;

use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use ValanticSpryker\Zed\Sitemap\Dependency\Plugin\SitemapCreatorPluginInterface;

/**
 * @method \ValanticSpryker\Zed\MerchantSitemapConnector\Business\MerchantSitemapConnectorFacadeInterface getFacade()
 */
class MerchantSitemapCreatorPlugin extends AbstractPlugin implements SitemapCreatorPluginInterface
{
    /**
     * @return array<\Generated\Shared\Transfer\SitemapFileTransfer>
     */
    public function createSitemapXml(): array
    {
        return $this->getFacade()
            ->createSitemapXml();
    }
}
