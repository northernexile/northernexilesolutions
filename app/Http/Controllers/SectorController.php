<?php

namespace App\Http\Controllers;

use App\Http\Requests\Sector\SectorCreateRequest;
use App\Http\Requests\Sector\SectorDeleteRequest;
use App\Http\Requests\Sector\SectorListRequest;
use App\Http\Requests\Sector\SectorUpdateRequest;
use App\Http\Traits\JsonResponseTrait;
use App\Services\Sector\SectorViewService;
use App\Services\Sector\SectorDeleteAllService;
use App\Services\Sector\SectorDeleteService;
use App\Services\Sector\SectorSaveService;
use App\Services\Sector\SectorListService;
use Illuminate\Http\JsonResponse;

class SectorController extends Controller
{
    use JsonResponseTrait;

    /**
     * @param SectorListService $service
     * @param SectorListRequest $request
     * @return JsonResponse
     */
    public function index(
        SectorListService $service,
        SectorListRequest $request) :JsonResponse
    {
        $response = null;

        try {

        } catch(\Throwable $throwable) {
            $response = $this->failure(
                'Cannot list [ModuleHumanReadable]',
                422,
                [
                    'message' => $throwable->getMessage()
                ]
            );
        } finally {
            return $response;
        }
    }

    /**
     * @param SectorViewService $service
     * @param SectorListRequest $request
     * @return JsonResponse
     */
    public function show(
        SectorViewService $service,
        SectorListRequest $request
    ) :JsonResponse
    {
        $response = null;

        try {

        } catch(\Throwable $throwable) {
            $response = $this->failure(
                'Cannot view [ModuleHumanReadable]',
                422,
                [
                    'message' => $throwable->getMessage()
                ]
            );
        } finally {
            return $response;
        }
    }

    /**
     * @param SectorCreateRequest $request
     * @param SectorSaveService $service
     * @return JsonResponse
     */
    public function create(
        SectorCreateRequest $request,
        SectorSaveService $service
    ) :JsonResponse
    {
        $response = null;

        try {

        } catch(\Throwable $throwable) {
            $response = $this->failure(
                'Cannot create [ModuleHumanReadable]',
                422,
                [
                    'message' => $throwable->getMessage()
                ]
            );
        } finally {
            return $response;
        }
    }

    /**
     * @param SectorUpdateRequest $request
     * @param SectorSaveService $service
     * @return JsonResponse
     */
    public function update(
        SectorUpdateRequest $request,
        SectorSaveService   $service
    ) :JsonResponse {
        try {
            $saved = $service
                ->setIdentity($request->route()->parameter('id'))
                ->setProperties($request->all())->save();
            if(!$saved) {
                throw new \Exception('Could not update [ModuleHumanReadable]');
            }

            $response = $this->success(
                'Content Updated',
                200,
                [
                    'sector'=>$service->getEntity(false)
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Error updating [ModuleHumanReadable].',
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
     * @param SectorDeleteRequest $request
     * @param SectorDeleteService $service
     * @return JsonResponse
     */
    public function delete(
        SectorDeleteRequest $request,
        SectorDeleteService $service
    ) :JsonResponse
    {
        $response = null;
        try {
            $deleted = $service->setIdentity($request->route()->parameter('id'))->delete();

            if(!$deleted){
                throw new \Exception('Could not delete record');
            }

            $response = $this->success('[ModuleHumanReadable] deleted',200,['message'=>'deleted','Sector'=>$request->all()]);
        } catch (\Throwable $throwable) {
            $response = $this->failure('Sector delete failed',422,['message'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }

    /**
     * @param SectorDeleteRequest $request
     * @param SectorDeleteAllService $service
     * @return JsonResponse
     */
    public function deleteAll(
        SectorDeleteRequest    $request,
        SectorDeleteAllService $service
    ) :JsonResponse
    {
        $response = null;

        try {
            $deleted = $service->truncate();

            if (!$deleted) {
                throw new \Exception('Could not delete all [ModuleHumanReadable]');
            }
            $response = $this->success(
                '[ModuleHumanReadable] deleted',
                200,
                []
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure($throwable->getMessage(), 422, ['message' => $throwable->getMessage()]);
        } finally {
            return $response;
        }
    }
}
