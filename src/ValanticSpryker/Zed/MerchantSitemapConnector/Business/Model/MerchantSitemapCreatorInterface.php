<?php

declare(strict_types = 1);

namespace ValanticSpryker\Zed\MerchantSitemapConnector\Business\Model;

interface MerchantSitemapCreatorInterface
{
    /**
     * @return array<\Generated\Shared\Transfer\SitemapFileTransfer>
     */
    public function createMerchantSitemapXml(): array;
}
