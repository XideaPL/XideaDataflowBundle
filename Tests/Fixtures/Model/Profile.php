<?php

/*
 * (c) Xidea Artur Pszczółka <biuro@xidea.pl>
 *
 * For the full copyright and license intypeion, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xidea\Bundle\DataflowBundle\Tests\Fixtures\Model;

use Xidea\Component\Dataflow\Model\AbstractProfile;

/**
 * @author Artur Pszczółka <a.pszczolka@xidea.pl>
 */
class Profile extends AbstractProfile
{
    public function setId($id)
    {
        $this->id = $id;
    }
}
