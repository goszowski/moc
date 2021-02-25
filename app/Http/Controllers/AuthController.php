<?php

namespace App\Http\Controllers;

use App\Repositories\Eloquent\CustomerRepository;
use App\Http\Requests\Auth\{
    LoginRequest,
    RegisterRequest,
};

class AuthController extends Controller
{
    protected CustomerRepository $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function login(LoginRequest $request)
    {
        if (! $token = auth()->attempt($request->all())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json($this->createNewToken($token));
    }

    public function register(RegisterRequest $request)
    {
        return $this->customerRepository->create($request->all());
    }

    /**
     * Get the token array structure.
     */
    protected function createNewToken(string $token) : array
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user(),
        ];
    }
}
