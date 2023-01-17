<?php

namespace App\Http\Controllers;

use App\Http\Traits\JsonResponseTrait;
use App\Services\TagCloud\TagCloudService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TagCloudController extends Controller
{
    use JsonResponseTrait;

    public function index(
        TagCloudService $service
    ) :JsonResponse
    {
        try {
            $response = $this->success('Tag cloud found',200,['cloud'=>$service->getCloud()]);
        } catch (\Throwable $throwable) {
            $response = $this->failure('Could not retrieve tags',422,['message'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }
}
