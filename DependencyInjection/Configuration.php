<?php

namespace Xidea\Bundle\DataflowBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder,
    Symfony\Component\Config\Definition\ConfigurationInterface,
    Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

use Xidea\Bundle\BaseBundle\DependencyInjection\AbstractConfiguration;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration extends AbstractConfiguration
{
    public function __construct($alias)
    {
        parent::__construct($alias);
    }
    
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = parent::getConfigTreeBuilder();
        $rootNode = $treeBuilder->root($this->alias);
        
        $rootNode
            ->children()
                ->scalarNode('base_dir')->isRequired()->cannotBeEmpty()->end()
                ->scalarNode('importer')->defaultValue('xidea_dataflow.importer.default')->end()
                ->scalarNode('exporter')->defaultValue('xidea_dataflow.exporter.default')->end()
            ->end()
        ;
        
        $this->addImportSection($rootNode);
        $this->addExportSection($rootNode);

        return $treeBuilder;
    }
    
    public function getDefaultTemplateNamespace()
    {
        return 'XideaDataflowBundle';
    }
    
    protected function addImportSection(ArrayNodeDefinition $node)
    {
        $node
            ->children()
                ->arrayNode('import')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('class')->isRequired()->cannotBeEmpty()->end()
                        ->scalarNode('configuration')->isRequired()->cannotBeEmpty()->end()
                        ->scalarNode('factory')->defaultValue('xidea_dataflow.import.factory.default')->end()
                        ->scalarNode('builder')->defaultValue('xidea_dataflow.import.builder.default')->end()
                        ->scalarNode('manager')->defaultValue('xidea_dataflow.import.manager.default')->end()
                        ->scalarNode('loader')->defaultValue('xidea_dataflow.import.loader.default')->end()
                    ->end()
                ->end()
            ->end()
        ;
    }
    
    protected function addExportSection(ArrayNodeDefinition $node)
    {
        $node
            ->children()
                ->arrayNode('export')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('class')->isRequired()->cannotBeEmpty()->end()
                        ->scalarNode('configuration')->isRequired()->cannotBeEmpty()->end()
                        ->scalarNode('factory')->defaultValue('xidea_dataflow.export.factory.default')->end()
                        ->scalarNode('builder')->defaultValue('xidea_dataflow.export.builder.default')->end()
//                        ->scalarNode('manager')->defaultValue('xidea_dataflow.import.manager.default')->end()
//                        ->scalarNode('loader')->defaultValue('xidea_dataflow.import.loader.default')->end()
                    ->end()
                ->end()
            ->end()
        ;
    }
}
