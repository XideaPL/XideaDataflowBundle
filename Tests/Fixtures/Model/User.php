<?php

/*
 * (c) Xidea Artur Pszczółka <biuro@xidea.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xidea\Bundle\DataflowBundle\Tests\Fixtures\Model;

use Xidea\Bundle\UserBundle\Model\AbstractAdvancedUser;

/**
 * @author Artur Pszczółka <a.pszczolka@xidea.pl>
 */
class User extends AbstractAdvancedUser
{
    public function getName()
    {
        return $this->getUsername();
    }
}