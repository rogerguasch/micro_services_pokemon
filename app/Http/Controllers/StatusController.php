<?php

namespace App\Http\Controllers;


use QueryBus;
use StatusNotOkException;
use StatusQuery;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class StatusController extends Controller
{
    private $queryBus;

    public function __construct(QueryBus $queryBus)
    {
        $this->queryBus = $queryBus;
    }

    public function index(): JsonResponse
    {

        try {
            $statusQuery = new StatusQuery();
            $response = $this->queryBus->handle($statusQuery);

            return new JsonResponse(json_encode($response), Response::HTTP_OK);

        } catch (StatusNotOkException $statusNotOkException) {
            dd($statusNotOkException->getMessage());
        }

    }
}
