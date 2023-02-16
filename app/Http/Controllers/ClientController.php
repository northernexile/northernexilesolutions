<?php

namespace App\Http\Controllers;

use App\Http\Requests\Client\ClientDeleteRequest;
use App\Http\Requests\Client\ClientListRequest;
use App\Http\Requests\Client\ClientCreateRequest;
use App\Http\Requests\Client\ClientSearchRequest;
use App\Http\Requests\Client\ClientUpdateRequest;
use App\Http\Requests\Client\ClientViewRequest;
use App\Http\Traits\JsonResponseTrait;
use App\Services\Client\ClientDeleteAllService;
use App\Services\Client\ClientDeleteService;
use App\Services\Client\ClientListService;
use App\Services\Client\ClientSaveService;
use App\Services\Client\ClientSearchService;
use App\Services\Client\ClientViewService;
use Illuminate\Http\JsonResponse;

class ClientController extends Controller
{
    use JsonResponseTrait;

        /**
     * @param ClientListRequest $request
     * @param ClientListService $service
     * @return JsonResponse
     */
    public function index(
        ClientListRequest $request,
        ClientListService $service
    ) :JsonResponse
    {
        $response =null;

        try {
            $response = $this->success(
                'Listing Clients',
                200,
                [
                    'Clients'=>$service->getList(),
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Could not list Client',
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
     * @param ClientViewRequest $request
     * @param ClientViewService $service
     * @return JsonResponse
     */
    public function show(
        ClientViewRequest $request,
        ClientViewService $service
    ) :JsonResponse
    {
        $response =null;

        try {
            $client = $service->setIdentity($request->route()->parameter('id'))->get();

            $response = $this->success('Client found',200,['Client'=>$client]);
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Could not list client',
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
     * @param ClientCreateRequest $request
     * @param ClientSaveService $service
     * @return JsonResponse
     */
    public function create(
        ClientCreateRequest $request,
        ClientSaveService   $service
    ) :JsonResponse {
        try {
            $saved = $service->setProperties($request->all())->save();

            if(!$saved) {
                throw new \Exception('Could not save Client');
            }

            $response = $this->success(
                'Client Saved',
                200,
                [
                    'client'=>$service->getEntity(false)
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Error creating client.',
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
     * @param ClientUpdateRequest $request
     * @param ClientSaveService $service
     * @return JsonResponse
     */
    public function update(
        ClientUpdateRequest $request,
        ClientSaveService   $service
    ) :JsonResponse {
        try {
            $saved = $service
                ->setIdentity($request->route()->parameter('id'))
                ->setProperties($request->all())->save();

            if(!$saved) {
                throw new \Exception('Could not update Client');
            }

            $response = $this->success(
                'Client Updated',
                200,
                [
                    'client'=>$service->getEntity(false)
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Error updating client.',
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
     * @param ClientDeleteRequest $request
     * @param ClientDeleteService $service
     * @return JsonResponse
     */
    public function delete(
        ClientDeleteRequest $request,
        ClientDeleteService $service
    ) :JsonResponse
    {
        $response = null;
        try {
            $deleted = $service->setIdentity($request->route()->parameter('id'))->delete();

            if(!$deleted){
                throw new \Exception('Could not delete record');
            }

            $response = $this->success('Client deleted',200,['message'=>'deleted','client'=>$request->all()]);
        } catch (\Throwable $throwable) {
            $response = $this->failure('Content delete failed',422,['message'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }

    /**
     * @param ClientDeleteRequest $request
     * @param ClientDeleteAllService $service
     * @return JsonResponse
     */
    public function deleteAll(
        ClientDeleteRequest $request,
        ClientDeleteAllService $service
    ) :JsonResponse
    {
        $response = null;

        try {
            $deleted = $service->truncate();

            if(!$deleted){
                throw new \Exception('Could not delete all Client');
            }
            $response = $this->success(
              'Client deleted',
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
     * @param ClientSearchRequest $request
     * @param ClientSearchService $service
     * @return JsonResponse
     */
    public function search(
        ClientSearchRequest $request,
        ClientSearchService $service
    ) :JsonResponse
    {
        $response = null;

        try {
            $term = $request->route()->parameter('term');
            $client = $service->setTerm($term)->search();

            $response = $this->success(
                $client->count().' Client found',
                200,
                [
                    'client' =>  $client
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure('Search failed',422,['message'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }
}

