<?php

namespace App\Exceptions;

use App\Tools\JsonTool;
use Exception;
use Illuminate\Http\JsonResponse;

class ApiException extends Exception
{
    public function report(): null
    {
        return null;
    }

    public function render(): JsonResponse
    {
        return JsonTool::error($this->getMessage());
    }
}
