<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use App\Services\UserService;

class AuthController extends Controller
{
     /**
     * __construct
     *
     * @param  UserService $service
     * @return void
     */
    public function __construct(UserService $service)
    {
        $this->service = $service;
        $this->middleware('auth:api', ['except' => ['login','register']]);
    }

    public function login(LoginRequest $request)
    {   
        $input = $request->validated();
        $credentials = [
            'email' => $input['email'],
            'password' => $input['password'],
        ];

        $token = Auth::attempt($credentials);

        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }

        $user = Auth::user();
        return response()->json([
                'status' => 'success',
                'user' => $user,
                'authorization' => [
                    'token' => $token,
                    'type' => 'bearer',
                ]
            ]);

    }

    public function register(UserRequest $request)
    {
        try{
            $user = $request->validated();
            try{
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);
            } catch (\Throwable $th) {
                var_dump($th->getMessage());
            }
            return response()->json(['user' => $user, 'message' => 'CREATED'], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json(['message' => 'User Registration Failed!'], Response::HTTP_CONFLICT);
        }
       



    /*
        $token = Auth::login($user);
        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    */
    }

    public function logout()
    {
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }

    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }
}
