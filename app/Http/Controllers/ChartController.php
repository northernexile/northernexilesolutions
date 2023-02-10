<?php

namespace App\Http\Controllers;

use App\Http\Traits\JsonResponseTrait;
use App\Services\Charts\ChartCollection;
use App\Services\Charts\FrameworkExperienceChart;
use App\Services\Charts\SectorExperienceChart;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    use JsonResponseTrait;

    /**
     * @param FrameworkExperienceChart $chart
     * @return JsonResponse
     */
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

    /**
     * @param SectorExperienceChart $chart
     * @return JsonResponse
     */
    public function sectors(
        SectorExperienceChart $chart
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
            $response = $this->failure('Could not get sector chart',422,['message'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }

    /**
     * @param ChartCollection $chartCollection
     * @return JsonResponse
     */
    public function charts(
        ChartCollection $chartCollection
    ):JsonResponse
    {
        try {
            $charts = collect();

            foreach ($chartCollection->getChartCollection() as $key => $chart){
                $chartItem = new \stdClass();
                $chartItem->data = $chart->getChartData();
                $chartItem->title = $key;
                $charts->add($chartItem);
            }

            $response = $this->success(
                'All Charts',
                200,
                ['charts'=>$charts]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure('Could not get charts',422,['message'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }
}
