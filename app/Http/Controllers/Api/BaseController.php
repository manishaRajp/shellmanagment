<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    public function sendResponse($result = [], $message)
    {
        $response = [
            'message' => $message,
            'data'    => $result,
        ];

        return response()->json($response, 200);
    }

    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'message' => $error,
        ];

        if (!empty($errorMessages)) {
            $response['errorMessages'] = $errorMessages;
        }

        return response()->json($response, $code);
    }

    public function sendValidationError($field, $error, $code = 422, $errorMessages = [])
    {
        $response = [
            'message' => 'The given data was invalid.',
            'errors' => [$field => $error],
        ];

        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }
}


