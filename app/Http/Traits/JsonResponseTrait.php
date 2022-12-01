<?php

namespace App\Http\Traits;

use Illuminate\Http\JsonResponse;

trait JsonResponseTrait
{
    /**
     * @param string $message
     * @param int $status
     * @param array $data
     * @return JsonResponse
     */
    protected function success(string $message = 'success', int $status = 200, array $data = []) :JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $data,
            'message' => $message,
        ], $status);
    }

    /**
     * @param string $message
     * @param int $status
     * @param array $data
     * @return JsonResponse
     */
    protected function failure(string $message = 'error', int $status = 422, array $data = []) :JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'data' => $data
        ], $status);
    }
}
