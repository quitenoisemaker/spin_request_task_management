<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //
    public function apiResponse(string $message, int $statusCode,array $data = [])
    {
        return response()->json([
            'statusCode' => $statusCode,
            'message' => $message,
            'data' => $data
        ], $statusCode);
    }
}
