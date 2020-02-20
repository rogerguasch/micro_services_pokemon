<?php

declare(strict_types=1);

namespace Pokemon\Domain\EventBus;

use Psr\EventDispatcher\StoppableEventInterface;

abstract class Event implements StoppableEventInterface
{

    private bool $isStopped = false;

    public function isPropagationStopped(): bool
    {
        return $this->isStopped;
    }

    public function preventDefault(): bool
    {
        $this->isStopped = true;
    }
}
