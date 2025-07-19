<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class BaseController extends Controller
{
    protected function successResponse($data, $message = null, $statusCode = 200): JsonResponse
    {
        if ($data instanceof JsonResource) {
            return $data->additional([
                'success' => true,
                'message' => $message,
            ])->response()->setStatusCode($statusCode);
        } else {
            return response()->json([
                'success' => true,
                'data' => $data,
                'message' => $message,
            ], $statusCode);
        }
    }

    protected function errorResponse($message, $statusCode = 400): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $message,
        ], $statusCode);
    }

    protected function noContentResponse($message = null): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => [],
            'message' => $message,
        ], 204);
    }
}
