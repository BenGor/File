<?php

/*
 * This file is part of the BenGorFile package.
 *
 * (c) Beñat Espiña <benatespina@gmail.com>
 * (c) Gorka Laucirica <gorka.lauzirika@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\BenGorFile\File\Domain\Model;

use BenGorFile\File\Domain\Model\FileAlreadyExistsException;
use PhpSpec\ObjectBehavior;

/**
 * Spec file of FileAlreadyExistsException class.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 */
class FileAlreadyExistsExceptionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(FileAlreadyExistsException::class);
    }

    function it_extends_exception()
    {
        $this->shouldHaveType(\Exception::class);
    }
}
