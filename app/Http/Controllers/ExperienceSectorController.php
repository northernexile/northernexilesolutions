<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExperienceSector\ExperienceSectorDeleteRequest;
use App\Http\Requests\ExperienceSector\ExperienceSectorListRequest;
use App\Http\Requests\ExperienceSector\ExperienceSectorCreateRequest;
use App\Http\Requests\ExperienceSector\ExperienceSectorSearchRequest;
use App\Http\Requests\ExperienceSector\ExperienceSectorUpdateRequest;
use App\Http\Requests\ExperienceSector\ExperienceSectorViewRequest;
use App\Http\Traits\JsonResponseTrait;
use App\Services\ExperienceSector\ExperienceSectorDeleteAllService;
use App\Services\ExperienceSector\ExperienceSectorDeleteService;
use App\Services\ExperienceSector\ExperienceSectorListService;
use App\Services\ExperienceSector\ExperienceSectorSaveService;
use App\Services\ExperienceSector\ExperienceSectorSearchService;
use App\Services\ExperienceSector\ExperienceSectorViewService;
use Illuminate\Http\JsonResponse;

class ExperienceSectorController extends Controller
{
    use JsonResponseTrait;

        /**
     * @param ExperienceSectorListRequest $request
     * @param ExperienceSectorListService $service
     * @return JsonResponse
     */
    public function index(
        ExperienceSectorListRequest $request,
        ExperienceSectorListService $service
    ) :JsonResponse
    {
        $response =null;

        try {
            $response = $this->success(
                'Listing ExperienceSectors',
                200,
                [
                    'experience_sectors'=>$service->getList(),
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Could not list ExperienceSector',
                422,
                [
                    'message'=>$throwable->getMessage()
                ]
            );
        } finally {
            return $response;
        }
    }

    /**
     * @param ExperienceSectorViewRequest $request
     * @param ExperienceSectorViewService $service
     * @return JsonResponse
     */
    public function show(
        ExperienceSectorViewRequest $request,
        ExperienceSectorViewService $service
    ) :JsonResponse
    {
        $response =null;

        try {
            $experienceSector = $service->setIdentity($request->route()->parameter('id'))->get();

            $response = $this->success('ExperienceSector found',200,['ExperienceSector'=>$experienceSector]);
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Could not list experience sector',
                422,
                [
                    'message'=>$throwable->getMessage()
                ]
            );
        } finally {
            return $response;
        }
    }

    /**
     * @param ExperienceSectorCreateRequest $request
     * @param ExperienceSectorSaveService $service
     * @return JsonResponse
     */
    public function create(
        ExperienceSectorCreateRequest $request,
        ExperienceSectorSaveService   $service
    ) :JsonResponse {
        try {
            $saved = $service->setProperties($request->all())->save();

            if(!$saved) {
                throw new \Exception('Could not save Experience Sector');
            }

            $response = $this->success(
                'Experience Sector Saved',
                200,
                [
                    'experience_sector'=>$service->getEntity(false)
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Error creating experience sector.',
                422,
                [
                    'message'=>$throwable->getMessage(),
                    'params'=>$request->all()
                ]
            );
        } finally {
            return $response;
        }
    }

    /**
     * @param ExperienceSectorUpdateRequest $request
     * @param ExperienceSectorSaveService $service
     * @return JsonResponse
     */
    public function update(
        ExperienceSectorUpdateRequest $request,
        ExperienceSectorSaveService   $service
    ) :JsonResponse {
        try {
            $saved = $service
                ->setIdentity($request->route()->parameter('id'))
                ->setProperties($request->all())->save();

            if(!$saved) {
                throw new \Exception('Could not update Experience Sector');
            }

            $response = $this->success(
                'Experience Sector Updated',
                200,
                [
                    'experience_sector'=>$service->getEntity(false)
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Error updating experience sector.',
                422,
                [
                    'message'=>$throwable->getMessage(),
                    'params'=>$request->all()
                ]
            );
        } finally {
            return $response;
        }
    }

    /**
     * @param ExperienceSectorDeleteRequest $request
     * @param ExperienceSectorDeleteService $service
     * @return JsonResponse
     */
    public function delete(
        ExperienceSectorDeleteRequest $request,
        ExperienceSectorDeleteService $service
    ) :JsonResponse
    {
        $response = null;
        try {
            $deleted = $service->setIdentity($request->route()->parameter('id'))->delete();

            if(!$deleted){
                throw new \Exception('Could not delete record');
            }

            $response = $this->success('ExperienceSector deleted',200,['message'=>'deleted','experience_sector'=>$request->all()]);
        } catch (\Throwable $throwable) {
            $response = $this->failure('Content delete failed',422,['message'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }

    /**
     * @param ExperienceSectorDeleteRequest $request
     * @param ExperienceSectorDeleteAllService $service
     * @return JsonResponse
     */
    public function deleteAll(
        ExperienceSectorDeleteRequest $request,
        ExperienceSectorDeleteAllService $service
    ) :JsonResponse
    {
        $response = null;

        try {
            $deleted = $service->truncate();

            if(!$deleted){
                throw new \Exception('Could not delete all Experience Sector');
            }
            $response = $this->success(
              'Experience Sector deleted',
              200,
              []
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure($throwable->getMessage(),422,['message'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }

    /**
     * @param ExperienceSectorSearchRequest $request
     * @param ExperienceSectorSearchService $service
     * @return JsonResponse
     */
    public function search(
        ExperienceSectorSearchRequest $request,
        ExperienceSectorSearchService $service
    ) :JsonResponse
    {
        $response = null;

        try {
            $term = $request->route()->parameter('term');
            $experiencesector = $service->setTerm($term)->search();

            $response = $this->success(
                $experiencesector->count().' Experience Sector found',
                200,
                [
                    'experience_sector' =>  $experiencesector
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure('Search failed',422,['message'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }
}

