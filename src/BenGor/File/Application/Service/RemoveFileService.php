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

use BenGor\File\Domain\Model\FileException;
use BenGor\File\Domain\Model\FileName;
use BenGor\File\Domain\Model\FileRepository;
use BenGor\File\Domain\Model\Filesystem;
use BenGor\File\Domain\Model\UploadedFileException;
use Ddd\Application\Service\ApplicationService;

/**
 * Remove file service class.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 */
final class RemoveFileService implements ApplicationService
{
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
     * @param FileRepository $aRepository THhe file repository
     */
    public function __construct(Filesystem $filesystem, FileRepository $aRepository)
    {
        $this->filesystem = $filesystem;
        $this->repository = $aRepository;
    }

    /**
     * {@inheritdoc}
     *
     * @param RemoveFileRequest $request The remove file request
     */
    public function execute($request = null)
    {
        $name = new FileName($request->name());

        if (false === $this->filesystem->has($name)) {
            throw UploadedFileException::doesNotExist($name);
        }
        $file = $this->repository->fileOfName($name);
        if (null === $file) {
            throw FileException::doesNotExist($name);
        }

        $this->filesystem->delete($name);
        $this->repository->remove($file);
    }
}
