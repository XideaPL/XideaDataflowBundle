<?php

namespace Xidea\Bundle\DataflowBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;

use Xidea\Bundle\BaseBundle\DependencyInjection\AbstractExtension;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class XideaDataflowExtension extends AbstractExtension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        list($config, $loader) = $this->setUp($configs, new Configuration($this->getAlias()), $container);
        
        $loader->load('dataflow.yml');
        $loader->load('profile.yml');
        $loader->load('profile_orm.yml');
        $loader->load('reader.yml');
        $loader->load('writer.yml');
        
        $container->setParameter('xidea_dataflow.base_dir', $config['base_dir']);
        
        $container->setAlias('xidea_dataflow.configuration', $config['configuration']);
        $container->setAlias('xidea_dataflow.dataflow', $config['dataflow']);

        $this->loadProfileSection($config['profile'], $container, $loader);
    }
    
    protected function loadProfileSection(array $config, ContainerBuilder $container, Loader\YamlFileLoader $loader)
    {
        $container->setParameter('xidea_dataflow.profile.class', $config['class']);

        $container->setAlias('xidea_dataflow.profile.factory', $config['factory']);
        $container->setAlias('xidea_dataflow.profile.builder', $config['builder']);
        $container->setAlias('xidea_dataflow.profile.manager', $config['manager']);
        $container->setAlias('xidea_dataflow.profile.loader', $config['loader']);
    }
    
    protected function getConfigurationDirectory()
    {
        return __DIR__.'/../Resources/config';
    }
}
