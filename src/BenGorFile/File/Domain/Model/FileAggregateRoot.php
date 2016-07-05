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
 * File aggregate root class.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 */
abstract class FileAggregateRoot
{
    /**
     * Array which contains the domain events.
     *
     * @var array
     */
    private $events = [];

    /**
     * Clears the events container.
     */
    public function eraseEvents()
    {
        $this->events = [];
    }

    /**
     * Gets the recorded domain events.
     *
     * @return array
     */
    public function events()
    {
        return $this->events;
    }

    /**
     * Publishes the domain event.
     *
     * If the solution needs a singleton based event system,
     * this methods will be overwritten.
     *
     * The recommend way is to record events domains in the aggregate root
     * so, by default, this method calls to the "record" method.
     *
     * @param FileEvent $anEvent The domain event
     */
    protected function publish(FileEvent $anEvent)
    {
        $this->record($anEvent);
    }

    /**
     * Saves the given domain event inside event container.
     *
     * @param FileEvent $anEvent The domain event
     */
    private function record(FileEvent $anEvent)
    {
        $this->events[] = $anEvent;
    }
}
