<?php

namespace Xidea\Bundle\DataflowBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;

use Xidea\Bundle\BaseBundle\AbstractBundle;

use Xidea\Bundle\DataflowBundle\DependencyInjection\Compiler\ReaderCompilerPass,
    Xidea\Bundle\DataflowBundle\DependencyInjection\Compiler\WriterCompilerPass;

class XideaDataflowBundle extends AbstractBundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new ReaderCompilerPass());
        $container->addCompilerPass(new WriterCompilerPass());
    }
    
    protected function getModelNamespace()
    {
        return 'Xidea\Component\Dataflow\Model';
    }
}
