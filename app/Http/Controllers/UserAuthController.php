<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UserAuthController extends Controller
{
    /**
     * Authenticate user.
     *
     * @param  \Illuminate\Http\Request  $request The request object containing client_key and secret_key.
     * @return \Illuminate\Http\JsonResponse The JSON response containing the access token if login is successful, or an error message if login fails.
     */
    public function authenticateUser(UserAuthRequest $request): JsonResponse
    {
        $clientKey = $request->client_key;
        $secretKey = $request->secret_key;

        $user = User::where('client_key', $clientKey)
            ->where('secret_key', $secretKey)
            ->first();

        if ($user) {
            $accessToken = $user->createToken('authToken')->accessToken;

            return $this->apiResponse('Login Successful', Response::HTTP_OK, ['access_token' => $accessToken]);
        }

        return $this->apiResponse('Unauthorized', Response::HTTP_UNAUTHORIZED);
    }
}
