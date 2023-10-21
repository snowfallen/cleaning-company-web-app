<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Services\Auth\LoginService;
use App\Http\Services\Auth\RegisterService;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    /**
     * @param LoginService $loginService
     * @param RegisterService $registerService
     */
    public function __construct(
        private readonly LoginService $loginService,
        private readonly RegisterService $registerService
    ){}

    /**
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request): JsonResponse
    {
        return $this->loginService->login($request->validated());
    }

    /**
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        return $this->registerService->register($request->validated());
    }

    /**
     * @param int $userId
     * @return JsonResponse
     */
    public function logout(int $userId): JsonResponse
    {
        return $this->loginService->logout($userId);
    }


}
