<?php

namespace App\Http\Controllers;

use App\Http\Requests\Sector\SectorCreateRequest;
use App\Http\Requests\Sector\SectorDeleteRequest;
use App\Http\Requests\Sector\SectorListRequest;
use App\Http\Requests\Sector\SectorUpdateRequest;
use App\Http\Traits\JsonResponseTrait;
use App\Services\Sector\SectorInUseService;
use App\Services\Sector\SectorViewService;
use App\Services\Sector\SectorDeleteAllService;
use App\Services\Sector\SectorDeleteService;
use App\Services\Sector\SectorSaveService;
use App\Services\Sector\SectorListService;
use Exception;
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
            $sectors = $service->getList();

            $response = $this->success(
              'Sector list retrieved',
              200,
              [
                  'sectors'=>$sectors
              ]
            );
        } catch(\Throwable $throwable) {
            $response = $this->failure(
                'Cannot list sectors',
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
            $sector = $service->setIdentity($request->route('id'))->get();

            $response = $this->success('Sector retrieved',200,['sector'=>$sector]);
        } catch(\Throwable $throwable) {
            $response = $this->failure(
                'Cannot view sectors',
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
            $saved = $service->setProperties($request->all())->save();

            if(!$saved){
                throw new Exception('Sector not created');
            }

            $response = $this->success(
                'Sector created',
                200,
                [
                    'sector'=>$service->getSavedEntity()
                ]
            );
        } catch(\Throwable $throwable) {
            $response = $this->failure(
                'Cannot create sector',
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
                ->setProperties($request->all())
                ->save();
            if(!$saved) {
                throw new Exception('Could not update sector');
            }

            $response = $this->success(
                'Sector Updated',
                200,
                [
                    'sector'=>$service->getSavedEntity()
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Error updating sector.',
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
     * @param SectorInUseService $inUseService
     * @return JsonResponse
     */
    public function delete(
        SectorDeleteRequest $request,
        SectorDeleteService $service,
        SectorInUseService $inUseService
    ) :JsonResponse
    {
        $response = null;
        try {
            $id = $request->route()->parameter('id');

            if($inUseService->setId($id)->isInUse()){
                throw new Exception('Sector is in use on work experience, delete failed');
            }

            $deleted = $service->setIdentity($id)->delete();

            if(!$deleted){
                throw new Exception('Could not delete record');
            }

            $response = $this->success('Sector deleted',200,['message'=>'deleted','Sector'=>$request->all()]);
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
                throw new Exception('Could not delete all sectors');
            }
            $response = $this->success(
                'sectors deleted',
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
