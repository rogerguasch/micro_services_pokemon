<?php

declare(strict_types=1);

namespace Pokemon\Infrastructure\Bus\Tactician;

use Pokemon\Domain\Bus\CommandBus;

class TacticianCommandBus extends \League\Tactician\CommandBus implements CommandBus
{
    public function handle($command): void
    {
        return parent::handle($command);
    }


}
