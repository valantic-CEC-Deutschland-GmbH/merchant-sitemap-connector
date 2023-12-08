<?php

declare(strict_types = 1);

namespace ValanticSpryker\Zed\MerchantSitemapConnector\Business;

use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \ValanticSpryker\Zed\MerchantSitemapConnector\Business\MerchantSitemapConnectorBusinessFactory getFactory()
 */
class MerchantSitemapConnectorFacade extends AbstractFacade implements MerchantSitemapConnectorFacadeInterface
{
    /**
     * @inheritDoc
     */
    public function createSitemapXml(): array
    {
        return $this->getFactory()
            ->createMerchantSitemapCreator()
            ->createMerchantSitemapXml();
    }
}
