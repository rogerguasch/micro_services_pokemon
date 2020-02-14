<?php

declare(strict_types=1);

namespace Pokemon\Domain\Bus;

interface CommandBus
{
    public function handle($command): void;
}
