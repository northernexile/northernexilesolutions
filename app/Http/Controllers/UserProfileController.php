<?php

namespace App\Http\Controllers;

use App\Http\Traits\JsonResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;

class UserProfileController extends Controller
{
    use JsonResponseTrait;

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request) :JsonResponse
    {
        try {
            $token = PersonalAccessToken::findToken($request->bearerToken());
            if(is_null($token)){
                throw new \Exception('Bearer token not found');
            }

            $user = $token->tokenable;

            if(is_null($user)){
                throw new \Exception('No user found for supplied token');
            }

            $response = $this->success('User found',200,['user'=>$user]);
        } catch (\Throwable $throwable) {
            $response = $this->failure('Could not retrieve user profile',422,['error'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }
}
