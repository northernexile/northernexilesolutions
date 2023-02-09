<?php

namespace App\Http\Controllers;

use App\Http\Traits\JsonResponseTrait;
use App\Services\CV\CVService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CurrentCVController extends Controller
{
    use JsonResponseTrait;
    /** @var CVService  */
    private CVService $service;


    /**
     * @param CVService $service
     */
    public function __construct(CVService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request) :JsonResponse
    {
        $response = null;
        try {
            $cv = $this->service->getCV();

            $response = $this->success('cv',200,['cv'=>$cv]);
        } catch (\Throwable $throwable) {
            $response = $this->failure('could not get cv',422,['message'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }

    public function pdf()
    {
        $response = null;

        try {

        } catch (\Throwable $throwable) {
            $response = response()->noContent();
        } finally {
            return $response;
        }
    }
}
