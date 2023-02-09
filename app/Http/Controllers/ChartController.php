<?php

namespace App\Http\Controllers;

use App\Http\Traits\JsonResponseTrait;
use App\Services\Charts\FrameworkExperienceChart;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    use JsonResponseTrait;

    public function frameworks(
        FrameworkExperienceChart $chart
    ) :JsonResponse
    {
        try {
            $result = $chart->getChartData();

            $response = $this->success(
                'Framework Experience Chart',
                200,
                ['chart'=>$result]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure('Could not get framework chart',422,['message'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }
}
