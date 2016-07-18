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

namespace BenGorFile\File\Application\Command\Upload;

use BenGorFile\File\Domain\Model\FileException;
use BenGorFile\File\Domain\Model\FileFactory;
use BenGorFile\File\Domain\Model\FileId;
use BenGorFile\File\Domain\Model\FileMimeType;
use BenGorFile\File\Domain\Model\FileName;
use BenGorFile\File\Domain\Model\FileRepository;
use BenGorFile\File\Domain\Model\Filesystem;

/**
 * Upload file handler class.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 */
class UploadFileHandler
{
    /**
     * The file factory.
     *
     * @var FileFactory
     */
    private $factory;

    /**
     * The filesystem.
     *
     * @var Filesystem
     */
    private $filesystem;

    /**
     * The file repository.
     *
     * @var FileRepository
     */
    private $repository;

    /**
     * Constructor.
     *
     * @param Filesystem     $filesystem  The filesystem
     * @param FileRepository $aRepository The file repository
     * @param FileFactory    $aFactory    The file factory
     */
    public function __construct(Filesystem $filesystem, FileRepository $aRepository, FileFactory $aFactory)
    {
        $this->factory = $aFactory;
        $this->filesystem = $filesystem;
        $this->repository = $aRepository;
    }

    /**
     * Handles the given command.
     *
     * @param UploadFileCommand $aCommand The command
     *
     * @throws FileException when file is already exists
     */
    public function __invoke(UploadFileCommand $aCommand)
    {
        $id = new FileId($aCommand->id());
        $file = $this->repository->fileOfId($id);
        if (null !== $file) {
            throw FileException::idAlreadyExists($id);
        }
        $name = new FileName($aCommand->name());
        if (true === $this->filesystem->has($name)) {
            throw FileException::alreadyExists($name);
        }

        $this->filesystem->write($name, $aCommand->uploadedFile());
        $file = $this->factory->build($id, $name, new FileMimeType($aCommand->mimeType()));

        $this->repository->persist($file);
    }
}
