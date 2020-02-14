<?php

declare(strict_types=1);

namespace Pokemon\Infrastructure\Bus\Tactician;

use League\Tactician\CommandBus;
use Pokemon\Domain\Bus\QueryBus;

class TacticianQueryBus extends CommandBus implements QueryBus
{
    public function handle($command): JsonSerializable
    {
        return parent::handle($command);
    }

}
