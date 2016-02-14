<?php

/*
 * This file is part of the BenGorFile library.
 *
 * (c) Beñat Espiña <benatespina@gmail.com>
 * (c) Gorka Laucirica <gorka.lauzirika@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\BenGor\File\Application\Service;

use BenGor\File\Application\Service\UploadFileRequest;
use BenGor\File\Domain\Model\UploadedFile;
use PhpSpec\ObjectBehavior;

/**
 * Spec file of UploadFileRequest class.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 */
class UploadFileRequestSpec extends ObjectBehavior
{
    function let(UploadedFile $uploadedFile)
    {
        $this->beConstructedWith($uploadedFile, 'dummy-file-name');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(UploadFileRequest::class);
    }

    function it_request()
    {
        $this->uploadedFile()->shouldReturnAnInstanceOf(UploadedFile::class);
        $this->name()->shouldReturn('dummy-file-name');
    }

    function it_request_without_name(UploadedFile $uploadedFile)
    {
        $this->beConstructedWith($uploadedFile);

        $this->uploadedFile()->shouldReturnAnInstanceOf(UploadedFile::class);
        $this->name()->shouldReturn(null);
    }
}
