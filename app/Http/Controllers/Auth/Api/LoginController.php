<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Traits\JsonResponseTrait;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LoginController extends \App\Http\Controllers\Auth\LoginController
{
    use JsonResponseTrait;

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function doLogin(Request $request) :JsonResponse
    {
        $response = null;

        try {
            $this->validateLogin($request);

            $isLoggedIn = $this->attemptLogin($request);

            if(!$isLoggedIn){
                throw new \Exception('Login failed');
            }
            /** @var User $user */
            $user = auth('sanctum')->user();
            /** @var  $token */
            $token = User::find($user->id)->createToken('Access Token')->plainTextToken;
            $user->token = $token;


            $response = $this->success(
                'success',
                200,
                [
                    'authentication'=>$user
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure('Login failed',422,['error'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }
}
