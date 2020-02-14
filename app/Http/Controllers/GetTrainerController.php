<?php

declare(strict_types=1);


namespace App\Http\Controllers;


use Exception;
use GetTrainerById;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Pokemon\Domain\Bus\QueryBus;

class GetTrainerController
{
    public function __invoke(
        Request $request,
        QueryBus $queryBus,
        $id
    ): JsonResponse {

        try {
            $trainer = $queryBus->handle(new GetTrainerById('3'));
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return new JsonResponse($trainer, 200);
    }
}
