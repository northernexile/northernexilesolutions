<?php

namespace App\Http\Controllers;

use App\Http\Traits\JsonResponseTrait;
use App\Services\Company\CompanyInformationService;
use Illuminate\Http\JsonResponse;

class CompanyInformationController extends Controller
{
    use JsonResponseTrait;

    /**
     * @param CompanyInformationService $companyInformationService
     * @return JsonResponse
     */
    public function show(
        CompanyInformationService $companyInformationService
    ) :JsonResponse
    {
        try {
            $response = $this->success(
                'Company information found',
                200,
                [
                    'company'=>$companyInformationService
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Could not get company information',
                422,
                ['message' => $throwable->getMessage()]
            );
        } finally {
            return $response;
        }
    }
}
