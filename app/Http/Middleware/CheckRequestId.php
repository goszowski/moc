<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\JsonResponse;

class CheckRequestId
{
    protected function errorResponse(string $message)
    {
        return response()->json([
            'errors' => [
                'request_id' => $message,
            ],
        ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(! $request->header('request_id'))
        {
            return $this->errorResponse('Parameter request_id is not passed in headers');
        }

        if(! Uuid::isValid($request->header('request_id')))
        {
            return $this->errorResponse('Parameter request_id is not valid UUID');
        }

        return $next($request);
    }
}
