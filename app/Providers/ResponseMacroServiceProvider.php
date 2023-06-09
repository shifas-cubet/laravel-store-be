<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class ResponseMacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        Response::macro('success', function ($message, $data = []) {
            return \response()->json([
                'message' => $message,
                'data' => $data
            ], 200);
        });

        Response::macro('error', function ($message, $statusCode = 400) {
            return \response()->json([
                'message' => $message
            ], $statusCode);
        });
    }
}
