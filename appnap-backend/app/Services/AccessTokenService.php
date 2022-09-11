<?php

namespace App\Services;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;


class AccessTokenService
{
    /**
     * @param $userInfo
     * @return JsonResponse
     */
    public static function getAccessToken($userInfo): JsonResponse
    {
        $tokenResult = $userInfo->createToken("Appnap");
        $token = $tokenResult->token;
        $token->expires_at = request()->filled('remember_me') ? now()->addMonth(1) : now()->addWeeks(1);
        $token->save();

        return response()->json([
            'user' => UserResource::make($userInfo),
            'access_token' => $tokenResult->accessToken,
            'status' => 200,
            'expires_at' => $token['expires_at']->toDateTimeString(),
            'token_type' => 'Bearer',
        ]);
    }

}
