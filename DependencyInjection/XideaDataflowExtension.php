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
        
        $loader->load('import.yml');
        $loader->load('import_orm.yml');
        $loader->load('export.yml');
        $loader->load('reader.yml');
        $loader->load('writer.yml');
        
        $container->setParameter('xidea_dataflow.base_dir', $config['base_dir']);
        
        $container->setAlias('xidea_dataflow.importer', $config['importer']);
        $container->setAlias('xidea_dataflow.exporter', $config['exporter']);

        $this->loadImportSection($config['import'], $container, $loader);
        $this->loadExportSection($config['export'], $container, $loader);
    }
    
    protected function loadImportSection(array $config, ContainerBuilder $container, Loader\YamlFileLoader $loader)
    {
        $container->setParameter('xidea_dataflow.import.class', $config['class']);
        
        $container->setAlias('xidea_dataflow.import.configuration', $config['configuration']);
        $container->setAlias('xidea_dataflow.import.factory', $config['factory']);
        $container->setAlias('xidea_dataflow.import.builder', $config['builder']);
        $container->setAlias('xidea_dataflow.import.manager', $config['manager']);
        $container->setAlias('xidea_dataflow.import.loader', $config['loader']);
    }
    
    protected function loadExportSection(array $config, ContainerBuilder $container, Loader\YamlFileLoader $loader)
    {
        $container->setParameter('xidea_dataflow.export.class', $config['class']);
        
        $container->setAlias('xidea_dataflow.export.configuration', $config['configuration']);
        $container->setAlias('xidea_dataflow.export.factory', $config['factory']);
        $container->setAlias('xidea_dataflow.export.builder', $config['builder']);
//        $container->setAlias('xidea_dataflow.export.manager', $config['manager']);
//        $container->setAlias('xidea_dataflow.export.loader', $config['loader']);
    }
    
    protected function getConfigurationDirectory()
    {
        return __DIR__.'/../Resources/config';
    }
}
