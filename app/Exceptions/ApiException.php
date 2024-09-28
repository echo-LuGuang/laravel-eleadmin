<?php

namespace App\Exceptions;

use App\Enums\Response\StatusCodeEnum;
use Exception;
use Illuminate\Http\JsonResponse;

class ApiException extends Exception
{
    public function render(): JsonResponse
    {
        return json($this->getMessage(), [], StatusCodeEnum::HTTP_BAD_REQUEST, []);
    }
}
