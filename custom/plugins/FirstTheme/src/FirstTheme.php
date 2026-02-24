<?php declare(strict_types=1);

namespace FirstTheme;

use Shopware\Core\Framework\Plugin;
use Shopware\Storefront\Framework\ThemeInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;


class FirstTheme extends Plugin implements ThemeInterface
{
    
public function build(ContainerBuilder $container): void
{
    parent::build($container);

    $loader = new XmlFileLoader(
        $container,
        new FileLocator(__DIR__ . '/Resources/config')
    );

    $loader->load('services.xml');
}
}