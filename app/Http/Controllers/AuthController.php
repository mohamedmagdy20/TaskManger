<?php

namespace App\Http\Controllers;

use App\Helper\ApiResponce;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\AuthResource;
use App\Http\Resources\UserResource;
use App\Interfaces\AuthRepositoriesInterface;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $authRepository;
    public function __construct(AuthRepositoriesInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function register(RegisterRequest $request)
    {
        try {
            $data = $request->validated();
            $user = $this->authRepository->register($data); 
            return ApiResponce::success(null, 'User Created', 201);
        } catch (Exception $e) {
            return ApiResponce::error( $e->getMessage());
        }
    }



    public function login(LoginRequest $request)
    {
        try{        
            $data = $request->validated();
            $user = $this->authRepository->login($data);
            return ApiResponce::success(new AuthResource($user) , 'User Login',200);
        }catch(Exception $e)
        {
            return ApiResponce::error( $e->getMessage());
        }
    }

    public function all()
    {
        $data = $this->authRepository->all();
        return ApiResponce::success(UserResource::collection($data));
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return ApiResponce::success(null,'Logout');
    }
}
