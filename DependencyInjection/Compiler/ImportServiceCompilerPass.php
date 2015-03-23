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
class ImportServiceCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $importer = $container->getAlias('xidea_dataflow.importer');
        
        if (!$container->hasDefinition($importer)) {
            return;
        }

        $definition = $container->getDefinition(
            $importer
        );

        $taggedServices = $container->findTaggedServiceIds(
            'xidea_dataflow.import_service'
        );
        foreach ($taggedServices as $id => $tags) {
            foreach ($tags as $attributes) {
                $definition->addMethodCall(
                    'addService',
                    array($attributes['context'], new Reference($id))
                );
            }
        }
    }
}