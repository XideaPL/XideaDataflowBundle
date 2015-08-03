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
                ->scalarNode('configuration')->defaultValue('xidea_dataflow.configuration.default')->end()
                ->scalarNode('dataflow')->defaultValue('xidea_dataflow.dataflow.default')->end()
            ->end()
        ;
        
        $this->addProfileSection($rootNode);

        return $treeBuilder;
    }
    
    protected function addProfileSection(ArrayNodeDefinition $node)
    {
        $node
            ->children()
                ->arrayNode('profile')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('class')->isRequired()->cannotBeEmpty()->end()
                        ->scalarNode('factory')->defaultValue('xidea_dataflow.profile.factory.default')->end()
                        ->scalarNode('builder')->defaultValue('xidea_dataflow.profile.builder.default')->end()
                        ->scalarNode('manager')->defaultValue('xidea_dataflow.profile.manager.default')->end()
                        ->scalarNode('loader')->defaultValue('xidea_dataflow.profile.loader.default')->end()
                    ->end()
                ->end()
            ->end()
        ;
    }
}
