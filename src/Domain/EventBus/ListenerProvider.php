<?php

declare(strict_types=1);


namespace Pokemon\Domain\EventBus;

use Psr\EventDispatcher\ListenerProviderInterface;

class ListenerProvider implements ListenerProviderInterface
{

    private array $mapping = [];

    /**
     * @inheritDoc
     */
    public function getListenersForEvent(object $event): iterable
    {
        return $this->mapping[get_class($event)] ?? [];
    }

    /**
     * @param string $eventClassName
     * @param string|callable $handler
     */
    public function subscribe(string $eventClassName, $handler): void
    {
        if (!isset($this->mapping[$eventClassName])) {
            $this->mapping[$eventClassName][] = [];
        }
        $this->mapping[$eventClassName][] = $handler;
    }
}
