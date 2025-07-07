<?php

namespace App\Exceptions;

use App\Exceptions\Interfaces\JsonResposeable;
use Exception;
use Symfony\Component\HttpFoundation\Response;

class NotFoundException extends Exception implements JsonResposeable
{
    public function __construct(string $message)
    {
        parent::__construct($message);
    }

    public function getStatusCode(): int
    {
        return Response::HTTP_NOT_FOUND;
    }
}
