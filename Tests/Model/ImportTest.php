<?php

/*
 * (c) Xidea Artur Pszczółka <biuro@xidea.pl>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xidea\Bundle\DataflowBundle\Tests\Model;

use Xidea\Bundle\DataflowBundle\Tests\Fixtures\Model\Import;

/**
 * @author Artur Pszczółka <artur.pszczolka@xidea.pl>
 */
class ImportTest extends \PHPUnit_Framework_TestCase
{
    public function testId()
    {
        $import = $this->createImport();
        $this->assertNull($import->getId());
        
        $import->setId(1);
        $this->assertEquals(1, $import->getId());
    }
    
    public function testName()
    {
        $import = $this->createImport();
        $this->assertNull($import->getName());
        
        $name = 'Import 1';
        
        $import->setName($name);
        $this->assertEquals($name, $import->getName());
    }
    
    public function testContext()
    {
        $import = $this->createImport();
        $this->assertNull($import->getContext());
        
        $context = 'context';
        
        $import->setContext($context);
        $this->assertEquals($context, $import->getContext());
    }
    
    public function testOptions()
    {
        $import = $this->createImport();
        $this->assertNull($import->getOptions());
        
        $options = array(
            'option_1' => 'Option 1',
            'option_2' => 'Option 2'
        );
        
        $import->setOptions($options);
        $this->assertInternalType('array', $import->getOptions());
        $this->assertEquals(2, count($import->getOptions()));
    }
    
    protected function createImport()
    {
        return new Import();
    }
}
