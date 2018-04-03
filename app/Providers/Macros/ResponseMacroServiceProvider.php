<?php

namespace App\Providers\Macros;

use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\ServiceProvider;

class ResponseMacroServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @param ResponseFactory $response
     * @return void
     */
    public function boot(ResponseFactory $response)
    {
        $response->macro('success', function ($message = '', array $data = []) : JsonResponse {
            return $this->json([
                'data' => $data,
                'status' => 'success',
                'msg' => $message
            ]);
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
