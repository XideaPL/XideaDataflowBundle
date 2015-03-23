<?php

/*
 * (c) Xidea Artur Pszczółka <biuro@xidea.pl>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xidea\Bundle\DataflowBundle\Tests\Model;

use Xidea\Bundle\DataflowBundle\Tests\Fixtures\Model\Export;

/**
 * @author Artur Pszczółka <artur.pszczolka@xidea.pl>
 */
class ExportTest extends \PHPUnit_Framework_TestCase
{
    public function testId()
    {
        $export = $this->createExport();
        $this->assertNull($export->getId());
        
        $export->setId(1);
        $this->assertEquals(1, $export->getId());
    }
    
    public function testName()
    {
        $export = $this->createExport();
        $this->assertNull($export->getName());
        
        $name = 'Export 1';
        
        $export->setName($name);
        $this->assertEquals($name, $export->getName());
    }
    
    public function testContext()
    {
        $export = $this->createExport();
        $this->assertNull($export->getContext());
        
        $context = 'context';
        
        $export->setContext($context);
        $this->assertEquals($context, $export->getContext());
    }
    
    public function testOptions()
    {
        $export = $this->createExport();
        $this->assertNull($export->getOptions());
        
        $options = array(
            'option_1' => 'Option 1',
            'option_2' => 'Option 2'
        );
        
        $export->setOptions($options);
        $this->assertInternalType('array', $export->getOptions());
        $this->assertEquals(2, count($export->getOptions()));
    }
    
    protected function createExport()
    {
        return new Export();
    }
}
