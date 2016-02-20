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

namespace BenGor\File\Infrastructure\Persistence\InMemory;

use BenGor\File\Domain\Model\File;
use BenGor\File\Domain\Model\FileExtension;
use BenGor\File\Domain\Model\FileId;
use BenGor\File\Domain\Model\FileName;
use BenGor\File\Domain\Model\FileRepository;

/**
 * In memory file repository class.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 */
final class InMemoryFileRepository implements FileRepository
{
    /**
     * File collection.
     *
     * @var File[]
     */
    private $files;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->files = [];
    }

    /**
     * {@inheritdoc}
     */
    public function fileOfId(FileId $anId)
    {
        if (isset($this->files[$anId->id()])) {
            return $this->files[$anId->id()];
        }
    }

    /**
     * {@inheritdoc}
     */
    public function fileOfName(FileName $aName, FileExtension $anExtension)
    {
        foreach ($this->files as $file) {
            if (true === $file->name()->equals($aName) && true === $file->extension()->equals($anExtension)) {
                return $file;
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function filesOfExtension(FileExtension $anExtension)
    {
        $files = [];
        foreach ($this->files as $file) {
            if (true === $file->extension()->equals($anExtension)) {
                $files[] = $file;
            }
        }

        return $files;
    }

    /**
     * {@inheritdoc}
     */
    public function persist(File $aFile)
    {
        $this->files[$aFile->id()->id()] = $aFile;
    }

    /**
     * {@inheritdoc}
     */
    public function remove(File $aFile)
    {
        unset($this->files[$aFile->id()->id()]);
    }

    /**
     * {@inheritdoc}
     */
    public function size()
    {
        return count($this->files);
    }

    /**
     * {@inheritdoc}
     */
    public function nextIdentity()
    {
        return new FileId();
    }
}
