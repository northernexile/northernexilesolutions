<?php

namespace App\Http\Controllers;

use App\Http\Requests\Service\ServiceDeleteRequest;
use App\Http\Requests\Service\ServiceListRequest;
use App\Http\Requests\Service\ServiceCreateRequest;
use App\Http\Requests\Service\ServiceSearchRequest;
use App\Http\Requests\Service\ServiceUpdateRequest;
use App\Http\Requests\Service\ServiceViewRequest;
use App\Http\Traits\JsonResponseTrait;
use App\Services\Service\ServiceDeleteAllService;
use App\Services\Service\ServiceDeleteService;
use App\Services\Service\ServiceListService;
use App\Services\Service\ServiceSaveService;
use App\Services\Service\ServiceSearchService;
use App\Services\Service\ServiceViewService;
use Illuminate\Http\JsonResponse;

class ServiceController extends Controller
{
    use JsonResponseTrait;

        /**
     * @param ServiceListRequest $request
     * @param ServiceListService $service
     * @return JsonResponse
     */
    public function index(
        ServiceListRequest $request,
        ServiceListService $service
    ) :JsonResponse
    {
        $response =null;

        try {
            $response = $this->success(
                'Listing Services',
                200,
                [
                    'Services'=>$serviceListService->getList(),
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Could not list Service',
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
     * @param ServiceViewRequest $request
     * @param ServiceViewService $service
     * @return JsonResponse
     */
    public function show(
        ServiceViewRequest $request,
        ServiceViewService $service
    ) :JsonResponse
    {
        $response =null;

        try {
            $service = $service->setIdentity($request->route()->parameter('id'))->get();

            $response = $this->success('Service found',200,['Service'=>$service]);
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Could not list service',
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
     * @param ServiceCreateRequest $request
     * @param ServiceSaveService $service
     * @return JsonResponse
     */
    public function create(
        ServiceCreateRequest $request,
        ServiceSaveService   $service
    ) :JsonResponse {
        try {
            $saved = $service->setProperties($request->all())->save();

            if(!$saved) {
                throw new \Exception('Could not save Service');
            }

            $response = $this->success(
                'Service Saved',
                200,
                [
                    'service'=>$service->getEntity(false)
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Error creating service.',
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
     * @param ServiceUpdateRequest $request
     * @param ServiceSaveService $service
     * @return JsonResponse
     */
    public function update(
        ServiceUpdateRequest $request,
        ServiceSaveService   $service
    ) :JsonResponse {
        try {
            $saved = $service
                ->setIdentity($request->route()->parameter('id'))
                ->setProperties($request->all())->save();

            if(!$saved) {
                throw new \Exception('Could not update Service');
            }

            $response = $this->success(
                'Service Updated',
                200,
                [
                    'service'=>$service->getEntity(false)
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Error updating service.',
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
     * @param ServiceDeleteRequest $request
     * @param ServiceDeleteService $service
     * @return JsonResponse
     */
    public function delete(
        ServiceDeleteRequest $request,
        ServiceDeleteService $service
    ) :JsonResponse
    {
        $response = null;
        try {
            $deleted = $service->setIdentity($request->route()->parameter('id'))->delete();

            if(!$deleted){
                throw new \Exception('Could not delete record');
            }

            $response = $this->success('Service deleted',200,['message'=>'deleted','service'=>$request->all()]);
        } catch (\Throwable $throwable) {
            $response = $this->failure('Content delete failed',422,['message'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }

    /**
     * @param ServiceDeleteRequest $request
     * @param ServiceDeleteAllService $service
     * @return JsonResponse
     */
    public function deleteAll(
        ServiceDeleteRequest $request,
        ServiceDeleteAllService $service
    ) :JsonResponse
    {
        $response = null;

        try {
            $deleted = $service->truncate();

            if(!$deleted){
                throw new \Exception('Could not delete all Service');
            }
            $response = $this->success(
              'Service deleted',
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
     * @param ServiceSearchRequest $request
     * @param ServiceSearchService $service
     * @return JsonResponse
     */
    public function search(
        ServiceSearchRequest $request,
        ServiceSearchService $service
    ) :JsonResponse
    {
        $response = null;

        try {
            $term = $request->route()->parameter('term');
            $content = $service->setTerm($term)->search();

            $response = $this->success(
                $service->count().' Service found',
                200,
                [
                    'service' =>  $service
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure('Search failed',422,['message'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }
}

