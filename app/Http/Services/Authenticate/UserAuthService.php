<?php

namespace App\Http\Services\Authenticate;

use App\Repository\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAuthService implements UserAuthServiceInterface
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * UserAuthService constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param $attribute
     * @return mixed
     */
    public function register($attribute)
    {
        return $this->userRepository->firstOrCreate([
            'name' => $attribute['name'],
            'email' => $attribute['email'],
            'password' => Hash::make($attribute['password']),
            'phone' => $attribute['phone'],
        ]);
    }

    /**
     * @param $attribute
     * @return array|mixed
     */
    public function login($attribute)
    {
        if (!Auth::attempt($attribute)) {
            return ['success' => false,'error' => 'Данные для входа недействительны'];
        }
        $user = $this->userRepository->firstOrFail($attribute['email']);
        $token = $user->createToken('auth_token')->plainTextToken;
        return [ 'success' => true,'user' => $user,'access_token' => $token, 'token_type' => 'Bearer'];
    }

    /**
     * @return mixed
     */
    public function logout()
    {
        return auth()->user()->tokens()->delete();
    }
}
