<?php

namespace App\Http\Services\Auth;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class LoginService
{
    /**
     * @param array $request
     * @return JsonResponse
     */
    public function login(array $request): JsonResponse
    {
        if (Auth::attempt($request)) {
            $user = Auth::user();
            $user->tokens()->delete();
            $token = $user->createToken('ApiToken')->plainTextToken;
            return response()->json([
                'data' => $user,
                'accessToken' => $token,
                'tokenType' => 'Bearer'
            ]);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    /**
     * @param string $userId
     * @return JsonResponse
     */
    public function logout(string $userId): JsonResponse
    {
        $user = User::getById($userId);
        if ($user) {
            $user->tokens()->delete();
            return response()->json(['response' => 'Success']);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
