<?php

namespace App\Http\Controllers;

use App\Http\Traits\JsonResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    use JsonResponseTrait;

    /** @var Request  */
    private Request $request;

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return JsonResponse
     */
    public function index() :JsonResponse
    {
        $response = null;

        try {
            $response = $this->success('Profile found',200,['profile'=>null]);
        } catch (\Throwable $throwable) {
            $response = $this->failure('Profile load failed',422,['message'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }
}
