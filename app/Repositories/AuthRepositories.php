<?php

namespace App\Repositories;

use App\Helper\ApiResponce;
use App\Interfaces\AuthRepositoriesInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthRepositories implements AuthRepositoriesInterface
{
    protected $model ; 
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function register(array $data)
    {
        $data ['password'] = Hash::make($data['password']);
        $user = $this->model->create($data);
        return $user;
    }

    public function login($data)
    {
        if(Auth::attempt($data))
        {
            $user = Auth::user();
            $user['token'] = $user->createToken('User Token')->plainTextToken;
            return $user;
        }
            return ApiResponce::error('Unauthorized',401);
    }

    public function all()
    {
        $users = $this->model->latest()->simplePaginate(5);
        return $users;
    }

    public function logout()
    {
        Auth::logout();
    }

}