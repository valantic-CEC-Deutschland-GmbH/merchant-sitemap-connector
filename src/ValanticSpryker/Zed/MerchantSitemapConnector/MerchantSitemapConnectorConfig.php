<?php

declare(strict_types = 1);

namespace ValanticSpryker\Zed\MerchantSitemapConnector;

use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Zed\Kernel\AbstractBundleConfig;
use ValanticSpryker\Shared\Sitemap\SitemapConstants;

class MerchantSitemapConnectorConfig extends AbstractBundleConfig
{
    /**
     * @return string
     */
    public function getYvesBaseUrl(): string
    {
        return $this->get(ApplicationConstants::BASE_URL_YVES);
    }

    /**
     * @return int
     */
    public function getSitemapUrlLimit(): int
    {
        return $this->get(SitemapConstants::SITEMAP_URL_LIMIT, 100);
    }
}
