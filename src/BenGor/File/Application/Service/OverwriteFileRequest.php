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

namespace BenGor\File\Application\Service;

use BenGor\File\Domain\Model\UploadedFile;

/**
 * Overwrite file request class.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 */
final class OverwriteFileRequest
{
    /**
     * The file name.
     *
     * @var string
     */
    private $name;

    /**
     * The uploaded file.
     *
     * @var UploadedFile
     */
    private $uploadedFile;

    /**
     * Constructor.
     *
     * @param UploadedFile $anUploadedFile The uploaded file
     * @param string       $aName          The file name
     */
    public function __construct(UploadedFile $anUploadedFile, $aName)
    {
        $this->name = $aName;
        $this->uploadedFile = $anUploadedFile;
    }

    /**
     * Gets the file name.
     *
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * Gets the uploaded file.
     *
     * @return UploadedFile
     */
    public function uploadedFile()
    {
        return $this->uploadedFile;
    }
}
