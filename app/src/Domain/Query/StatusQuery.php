<?php

declare(strict_types=1);


class StatusQuery
{
    private $status;

    public function __construct(string $status = 'OK')
    {
        $this->status = $status;
    }

    public function status(): string
    {
        return $this->status;
    }

}
