# Merchant sitemap connector

[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%208.0-8892BF.svg)](https://php.net/)

Description
This module is used alongside `valantic-spryker/sitemap` Sitemap module to extend the sitemap with merchant URLs from recently created Spryker marketplace.

# Usage

1. `composer require valantic-spryker/sitemap-merchant-connector`
2. Since this is under ValanticSpryker namespace, make sure that in `config_default`:
   1. `$config[KernelConstants::CORE_NAMESPACES]` has the namespace
   2. `$config[KernelConstants::PROJECT_NAMESPACES]` has the namespace
5. Add `MerchantSitemapCreatorPlugin` to `\ValanticSpryker\Zed\Sitemap\SitemapDependencyProvider::getSitemapCreatorPluginStack`
6. Add `\ValanticSpryker\Shared\SitemapMerchantConnector\MerchantSitemapConnectorConstants::RESOURCE_TYPE` to `\ValanticSpryker\Yves\Sitemap\SitemapDependencyProvider::getAvailableSitemapRouteResources`
7. Now the Sitemap will include **published** URLs of merchants.

# Testing

Tests do not work without Spryker environment, since Spryker helpers are used. To run tests, execute following command in root Spryker directory:

`codecept run -c vendor/valantic-spryker/merchant-sitemap-connector/tests/ValanticSprykerTest/Zed/MerchantSitemapConnector`
