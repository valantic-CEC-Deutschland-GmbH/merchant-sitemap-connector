<?php

declare(strict_types = 1);

namespace ValanticSpryker\Zed\MerchantSitemapConnector;

use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

/**
 * @method \ValanticSpryker\Zed\MerchantSitemapConnector\MerchantSitemapConnectorConfig getConfig()
 */
class MerchantSitemapConnectorDependencyProvider extends AbstractBundleDependencyProvider
{
    /**
     * @var string
     */
    public const SERVICE_SITEMAP = 'SERVICE_SITEMAP';

    /**
     * @var string
     */
    public const FACADE_STORE = 'FACADE_STORE';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);
        $this->addSitemapService($container);
        $this->addStoreFacade($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return void
     */
    protected function addSitemapService(Container $container): void
    {
        $container->set(static::SERVICE_SITEMAP, fn () => $container->getLocator()->sitemap()->service());
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return void
     */
    private function addStoreFacade(Container $container): void
    {
        $container->set(static::FACADE_STORE, fn () => $container->getLocator()->store()->facade());
    }
}
