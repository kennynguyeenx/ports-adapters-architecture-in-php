<?php

declare(strict_types=1);

namespace Kennynguyeenx\PortsAndAdapters\Domain\Borrowing\Application;

use Kennynguyeenx\PortsAndAdapters\Domain\Borrowing\Core\Model\MakeBookAvailableCommand;
use Kennynguyeenx\PortsAndAdapters\Domain\Borrowing\Core\Ports\Incoming\MakeBookAvailable;

/**
 * Class NewBookWasAddedEventHandler
 * @package Kennynguyeenx\PortsAndAdapters\Domain\Borrowing\Application
 */
class NewBookWasAddedEventHandler
{
    /**
     * @var MakeBookAvailable
     */
    private $makeBookAvailable;

    /**
     * NewBookWasAddedEventHandler constructor.
     * @param MakeBookAvailable $makeBookAvailable
     */
    public function __construct(MakeBookAvailable $makeBookAvailable)
    {
        $this->makeBookAvailable = $makeBookAvailable;
    }

    /**
     * @param NewBookWasAddedEvent $newBookWasAddedEvent
     */
    public function handle(NewBookWasAddedEvent $newBookWasAddedEvent)
    {
        $this->makeBookAvailable->handleMakeBookAvailableCommand(
            new MakeBookAvailableCommand($newBookWasAddedEvent->getBookId())
        );
    }
}
