<?php

declare(strict_types=1);


interface CommandBus
{
    public function handle($commandBus): void;
}
