<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Traits\JsonResponseTrait;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RegistrationController extends RegisterController
{
    use JsonResponseTrait;

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function register(Request $request) :JsonResponse
    {
        $response = null;
        try {
            $this->validator($request->all())->validate();
            $user = $this->create($request->all());

            $createdUser = User::find($user->id);

            $response = $this->success(
                'User created',
                201,
                [
                    'authentication'=>$createdUser
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure(
              'Failed registration',
              422,
              [
                  'error'=>$throwable->getMessage()
              ]
            );
        } finally {
            return $response;
        }
    }
}
