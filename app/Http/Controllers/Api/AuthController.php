<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Http\Services\Authenticate\UserAuthServiceInterface;
use App\Repository\User\UserRepositoryInterface;


class AuthController extends Controller
{

    /**
     * @var UserAuthServiceInterface
     */
    private $userAuthService;
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * AuthController constructor.
     * @param UserAuthServiceInterface $userAuthService
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserAuthServiceInterface $userAuthService,UserRepositoryInterface $userRepository)
    {
        $this->userAuthService = $userAuthService;
        $this->userRepository = $userRepository;
    }

    /**
     * @param RegisterRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterRequest $request)
    {
        return response()->json(['success' => true,'data' => new UserResource($this->userAuthService->register($request->all()))],200);
    }

    public function login(LoginRequest $request)
    {
        $result = $this->userAuthService->login($request->all());
        if(!isset($result['error'])){
            return response()->json($result,200);
        }else{
            return response()->json($result,422);
        }
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $this->userAuthService->logout();
        return response()->json(['success' => true,'message' => 'Токен удален'],200);
    }
}
