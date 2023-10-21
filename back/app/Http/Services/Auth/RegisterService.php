<?php

namespace App\Http\Services\Auth;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class RegisterService
{
    /**
     * @param array $request
     * @return JsonResponse
     */
    public function register(array $request): JsonResponse
    {
        $user = User::create($request);
        $token = $user->createToken('ApiToken')->plainTextToken;
        return response()->json([
            'data' => $user,
            'accessToken' => $token,
            'tokenType' => 'Bearer'
        ], 201);
    }
}
