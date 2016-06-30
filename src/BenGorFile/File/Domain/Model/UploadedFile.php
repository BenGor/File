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

namespace BenGorFile\File\Domain\Model;

/**
 * Uploaded file domain interface.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 */
interface UploadedFile
{
    /**
     * Gets the content.
     *
     * @return mixed
     */
    public function content();

    /**
     * Gets the extension.
     *
     * @return string
     */
    public function extension();

    /**
     * Gets the name.
     *
     * @return string
     */
    public function name();
}
