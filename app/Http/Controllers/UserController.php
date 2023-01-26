<?php

namespace App\Http\Controllers;

use App\Http\Traits\JsonResponseTrait;
use App\Services\Profile\Profile;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use JsonResponseTrait;

    /**
     * @param Request $request
     * @param Profile $service
     * @return JsonResponse
     */
    public function showPrimaryUser(
        Request $request,
        Profile $service
    ) :JsonResponse
    {
        $response = null;
        try {
            $profile = $service->setUserId(config('profile.primaryId'));

            $response = $this->success('Profile loaded',200,['profile'=>$profile]);
        } catch (\Throwable $throwable) {
            $response = $this->failure('Could not load primary user',422,['message'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }
}
