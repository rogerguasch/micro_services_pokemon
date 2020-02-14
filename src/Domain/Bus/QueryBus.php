<?php

declare(strict_types=1);

namespace Pokemon\Domain\Bus;

use JsonSerializable;

interface QueryBus
{
    public function handle($command): JsonSerializable;
}
