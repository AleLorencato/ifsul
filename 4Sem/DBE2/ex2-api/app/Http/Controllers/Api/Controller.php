<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\ExceptionJsonResponse;
use Exception;
use Illuminate\Http\Request;

class Controller
{
    protected function errorHandler(string $message, Exception $error, int $statusCode)
    {
        throw new ExceptionJsonResponse(message: $message, previous: $error, code: $statusCode);
    }
}
