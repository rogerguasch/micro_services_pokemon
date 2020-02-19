<?php

declare(strict_types=1);

namespace Pokemon\Domain\Bus;

interface QueryBus
{
    public function handle($command);
}
