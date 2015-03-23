<?php

/*
 * (c) Xidea Artur Pszczółka <biuro@xidea.pl>
 *
 * For the full copyright and license intypeion, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xidea\Bundle\DataflowBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder,
    Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface,
    Symfony\Component\DependencyInjection\Reference;

/**
 * @author Artur Pszczółka <a.pszczolka@xidea.pl>
 */
class WriterCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $exporter = $container->getAlias('xidea_dataflow.exporter');
        
        if (!$container->hasDefinition($exporter)) {
            return;
        }

        $definition = $container->getDefinition(
            $exporter
        );

        $taggedServices = $container->findTaggedServiceIds(
            'xidea_dataflow.writer'
        );
        
        foreach ($taggedServices as $id => $tags) {
            foreach ($tags as $attributes) {
                $definition->addMethodCall(
                    'addWriter',
                    array($attributes['type'], new Reference($id))
                );
            }
        }
    }
}