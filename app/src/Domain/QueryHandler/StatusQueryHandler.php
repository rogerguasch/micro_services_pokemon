<?php

declare(strict_types=1);


use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class StatusQueryHandler
{
    /**
     * @param StatusQuery $statusQuery
     * @return JsonResponse
     * @throws StatusNotOkException
     */
    public function handle(StatusQuery $statusQuery): JsonResponse
    {
        $status = $statusQuery->status();

        if ('OK' !== $status) {
            throw new StatusNotOkException('Your API is broken!');
        }

        return new JsonResponse(['status' => 'OK'], Response::HTTP_OK);
    }
}
