<?php

namespace App\Exceptions;

use App\Tools\JsonTool;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RuntimeException extends Exception
{
    public function render(Request $request): JsonResponse|false
    {
        if ($request->is('api/*')) {

            $isDebug = app()->hasDebugModeEnabled();

            $data = [];

            if ($isDebug) {
                $data = [
                    'message' => $this->getMessage(),
                    'code' => $this->getCode(),
                    'file' => $this->getFile(),
                    'line' => $this->getLine(),
                ];
            }

            return JsonTool::fail($data);
        }

        return false;
    }
}
