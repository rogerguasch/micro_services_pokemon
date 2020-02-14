<?php

declare(strict_types=1);

namespace Pokemon\Application\Query;

class GetTrainerByIdHandler
{
    public function __invoke(GetTrainerById $getTrainerById)
    {
        return ['nickname' => 'buenosmemes'];
    }

}
