<?php

declare(strict_types = 1);

namespace ValanticSpryker\Zed\MerchantSitemapConnector\Business;

interface MerchantSitemapConnectorFacadeInterface
{
    /**
     * Specifications:
     * - Creates sitemap XML to be consumed by parent module.
     *
     * @return array<\Generated\Shared\Transfer\SitemapFileTransfer>
     */
    public function createSitemapXml(): array;
}
