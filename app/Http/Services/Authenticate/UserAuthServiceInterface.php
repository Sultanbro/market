<?php

namespace App\Http\Services\Authenticate;

interface UserAuthServiceInterface
{
    /**
     * @param $attribute
     * @return mixed
     */
    public function register($attribute);

    /**
     * @param $attribute
     * @return mixed
     */
    public function login($attribute);

    /**
     * @return mixed
     */
    public function logout();
}
