<?php

namespace App\Facades;

use App\Enums\GeneralErrorMsg;
use App\Wrappers\ResponseWrapper;
use Illuminate\Http\JsonResponse;
use JsonSerializable;
use Symfony\Component\HttpFoundation\Response;

class ResponseFacade
{
    public static function jsonSuccess(array | JsonSerializable | null $data, int $status = 200): JsonResponse
    {
        return self::jsonResponse(
            new ResponseWrapper(
                data: $data,
                status: $status,
            )
        );
    }

    public static function jsonUnhandledException(): JsonResponse
    {
        return self::jsonResponse(
            new ResponseWrapper(
                status: Response::HTTP_INTERNAL_SERVER_ERROR,
                errors: GeneralErrorMsg::UNHANDLED_EXCEPTION_DEFAULT->value
            )
        );
    }

    public static function jsonResponse(ResponseWrapper $responseWrapper): JsonResponse
    {
        return response()->json(data: $responseWrapper, status: $responseWrapper->getStatus());
    }
}
