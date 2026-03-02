<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Zed\StoreDataImport;

use Orm\Zed\Store\Persistence\SpyStoreQuery;
use Spryker\Zed\DataImport\DataImportDependencyProvider;
use Spryker\Zed\Kernel\Container;

/**
 * @method \Spryker\Zed\StoreDataImport\StoreDataImportConfig getConfig()
 */
class StoreDataImportDependencyProvider extends DataImportDependencyProvider
{
    /**
     * @var string
     */
    public const PROPEL_QUERY_STORE = 'PROPEL_QUERY_STORE';

    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $container = $this->addStorePropelQuery($container);

        return $container;
    }

    protected function addStorePropelQuery(Container $container): Container
    {
        $container->set(static::PROPEL_QUERY_STORE, $container->factory(function (): SpyStoreQuery {
            return SpyStoreQuery::create();
        }));

        return $container;
    }
}
