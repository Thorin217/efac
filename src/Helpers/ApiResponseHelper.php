<?php

use Illuminate\Http\JsonResponse;

if (!function_exists('apiResponseSuccess')) {
    function apiResponseSuccess($data = null, $message = 'Success', $statusCode = 200, $meta = null): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $data,
            'message' => $message,
            'meta' => $meta,
            'status' => $statusCode,
        ], $statusCode);
    }
}

if (!function_exists('apiResponseError')) {
    function apiResponseError($message = 'Error', $statusCode = 400, $meta = null): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'meta' => $meta,
            'status' => $statusCode,
        ], $statusCode);
    }
}
