<?php

/*
 * (c) Xidea Artur Pszczółka <biuro@xidea.pl>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xidea\Bundle\DataflowBundle\Tests\Model;

use Xidea\Bundle\DataflowBundle\Tests\Fixtures\Model\Profile;

/**
 * @author Artur Pszczółka <artur.pszczolka@xidea.pl>
 */
class ProfileTest extends \PHPUnit_Framework_TestCase
{
    public function testId()
    {
        $import = $this->createProfile();
        $this->assertNull($import->getId());
        
        $import->setId(1);
        $this->assertEquals(1, $import->getId());
    }
    
    public function testName()
    {
        $import = $this->createProfile();
        $this->assertNull($import->getName());
        
        $name = 'Profile 1';
        
        $import->setName($name);
        $this->assertEquals($name, $import->getName());
    }
    
    public function testContext()
    {
        $import = $this->createProfile();
        $this->assertNull($import->getContext());
        
        $context = 'context';
        
        $import->setContext($context);
        $this->assertEquals($context, $import->getContext());
    }
    
    public function testOptions()
    {
        $import = $this->createProfile();
        $this->assertNull($import->getOptions());
        
        $options = array(
            'option_1' => 'Option 1',
            'option_2' => 'Option 2'
        );
        
        $import->setOptions($options);
        $this->assertInternalType('array', $import->getOptions());
        $this->assertEquals(2, count($import->getOptions()));
    }
    
    protected function createProfile()
    {
        return new Profile();
    }
}
