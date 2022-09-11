<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Models\User;
use App\Services\AccessTokenService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * @param UserLoginRequest $request
     * @return JsonResponse
     */
    public function login(UserLoginRequest $request)
    {
        $credentials = request(['email', 'password', 'remember_me']);

        if (!Auth::attempt($credentials)) {

            return response()->json([
                'message' => 'Unauthorized',
                'details' => "Email and Password not match.",
                'status' => 401
            ]);
        }
        $user = $request->user();
        return AccessTokenService::getAccessToken($user);
    }

    /**
     * @param UserLoginRequest $request
     * @return JsonResponse
     */
    public function register(UserLoginRequest $request)
    {
        $payload = $request->all();
        $payload['password'] = Hash::make($payload['password']);
        $user = User::create($payload);
        return AccessTokenService::getAccessToken($user);
    }

    /**
     * user logout
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Successfully logged out', 'status' => 200]);
    }

    /**
     * @return JsonResponse|void
     */
    public function checkToken()
    {
        if (!Auth::guard('api')->check())
            return response()->json(["message" => "Token was not validate", "status" => 401]);
        else  return response()->json(["message" => "Token was validate", "status" => 200]);
    }
}
