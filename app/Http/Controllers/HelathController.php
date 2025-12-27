<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class HelathController extends Controller
{
    public function __invoke(): JsonResponse
    {
        return response()->json([
            'status' => 'OK',
            'app' => config('app.name'),
            'time' => now()->toDateTimeString(),
        ], 200);
    }
}
