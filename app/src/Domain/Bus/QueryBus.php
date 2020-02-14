<?php

declare(strict_types=1);


interface QueryBus
{
    public function handle($queryBus);
}
