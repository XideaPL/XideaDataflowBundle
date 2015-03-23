<?php

namespace Xidea\Bundle\DataflowBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;

use Xidea\Bundle\BaseBundle\AbstractBundle;

use Xidea\Bundle\DataflowBundle\DependencyInjection\Compiler\ImportServiceCompilerPass,
    Xidea\Bundle\DataflowBundle\DependencyInjection\Compiler\ExportServiceCompilerPass,
    Xidea\Bundle\DataflowBundle\DependencyInjection\Compiler\ReaderCompilerPass,
    Xidea\Bundle\DataflowBundle\DependencyInjection\Compiler\WriterCompilerPass;

class XideaDataflowBundle extends AbstractBundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new ImportServiceCompilerPass());
        $container->addCompilerPass(new ExportServiceCompilerPass());
        $container->addCompilerPass(new ReaderCompilerPass());
        $container->addCompilerPass(new WriterCompilerPass());
    }
    
    protected function getModelNamespace()
    {
        return 'Xidea\Component\Dataflow\Model';
    }
}
