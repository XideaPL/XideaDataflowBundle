<?php

/*
 * (c) Xidea Artur Pszczółka <biuro@xidea.pl>
 *
 * For the full copyright and license intypeion, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xidea\Bundle\DataflowBundle;

use Xidea\Bundle\BaseBundle\Configuration as BaseConfiguration;

use Xidea\Component\Dataflow\ConfigurationInterface;

/**
 * @author Artur Pszczółka <a.pszczolka@xidea.pl>
 */
class Configuration extends BaseConfiguration implements ConfigurationInterface
{
    /*
     * @var string
     */
    protected $basePath;
    
    /*
     * 
     */
    public function __construct($basePath)
    {
        $this->basePath = $basePath.'/var';
    }
    
    /**
     * @inheritDoc
     */
    public function getBasePath()
    {
        return $this->basePath;
    }
    
    /**
     * @inheritDoc
     */
    public function getFilePath($filePath)
    {
        return sprintf('%s/%s', $this->getBasePath(), $filePath);
    }
}
