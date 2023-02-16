<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientAddress\ClientAddressDeleteRequest;
use App\Http\Requests\ClientAddress\ClientAddressListRequest;
use App\Http\Requests\ClientAddress\ClientAddressCreateRequest;
use App\Http\Requests\ClientAddress\ClientAddressSearchRequest;
use App\Http\Requests\ClientAddress\ClientAddressUpdateRequest;
use App\Http\Requests\ClientAddress\ClientAddressViewRequest;
use App\Http\Traits\JsonResponseTrait;
use App\Services\ClientAddress\ClientAddressDeleteAllService;
use App\Services\ClientAddress\ClientAddressDeleteService;
use App\Services\ClientAddress\ClientAddressListService;
use App\Services\ClientAddress\ClientAddressSaveService;
use App\Services\ClientAddress\ClientAddressSearchService;
use App\Services\ClientAddress\ClientAddressViewService;
use Illuminate\Http\JsonResponse;

class ClientAddressController extends Controller
{
    use JsonResponseTrait;

        /**
     * @param ClientAddressListRequest $request
     * @param ClientAddressListService $service
     * @return JsonResponse
     */
    public function index(
        ClientAddressListRequest $request,
        ClientAddressListService $service
    ) :JsonResponse
    {
        $response =null;

        try {
            $response = $this->success(
                'Listing Client Addresses',
                200,
                [
                    'client_addresses'=>$service->getList(),
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Could not list Client Addresses',
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
     * @param ClientAddressViewRequest $request
     * @param ClientAddressViewService $service
     * @return JsonResponse
     */
    public function show(
        ClientAddressViewRequest $request,
        ClientAddressViewService $service
    ) :JsonResponse
    {
        $response =null;

        try {
            $clientAddress = $service->setIdentity($request->route()->parameter('id'))->get();

            $response = $this->success('Client Address found',200,['client_address'=>$clientAddress]);
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Could not list clientaddress',
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
     * @param ClientAddressCreateRequest $request
     * @param ClientAddressSaveService $service
     * @return JsonResponse
     */
    public function create(
        ClientAddressCreateRequest $request,
        ClientAddressSaveService   $service
    ) :JsonResponse {
        try {
            $saved = $service->setProperties($request->all())->save();

            if(!$saved) {
                throw new \Exception('Could not save Client Address');
            }

            $response = $this->success(
                'Client Address Saved',
                200,
                [
                    'client_address'=>$service->getEntity(false)
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Error creating client address.',
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
     * @param ClientAddressUpdateRequest $request
     * @param ClientAddressSaveService $service
     * @return JsonResponse
     */
    public function update(
        ClientAddressUpdateRequest $request,
        ClientAddressSaveService   $service
    ) :JsonResponse {
        try {
            $saved = $service
                ->setIdentity($request->route()->parameter('id'))
                ->setProperties($request->all())->save();

            if(!$saved) {
                throw new \Exception('Could not update Client Address');
            }

            $response = $this->success(
                'ClientAddress Updated',
                200,
                [
                    'client_address'=>$service->getEntity(false)
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Error updating client address.',
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
     * @param ClientAddressDeleteRequest $request
     * @param ClientAddressDeleteService $service
     * @return JsonResponse
     */
    public function delete(
        ClientAddressDeleteRequest $request,
        ClientAddressDeleteService $service
    ) :JsonResponse
    {
        $response = null;
        try {
            $deleted = $service->setIdentity($request->route()->parameter('id'))->delete();

            if(!$deleted){
                throw new \Exception('Could not delete record');
            }

            $response = $this->success('Client Address deleted',200,['message'=>'deleted','client_address'=>$request->all()]);
        } catch (\Throwable $throwable) {
            $response = $this->failure('Content delete failed',422,['message'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }

    /**
     * @param ClientAddressDeleteRequest $request
     * @param ClientAddressDeleteAllService $service
     * @return JsonResponse
     */
    public function deleteAll(
        ClientAddressDeleteRequest $request,
        ClientAddressDeleteAllService $service
    ) :JsonResponse
    {
        $response = null;

        try {
            $deleted = $service->truncate();

            if(!$deleted){
                throw new \Exception('Could not delete all Client Addresses');
            }
            $response = $this->success(
              'Client Addresses deleted',
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
     * @param ClientAddressSearchRequest $request
     * @param ClientAddressSearchService $service
     * @return JsonResponse
     */
    public function search(
        ClientAddressSearchRequest $request,
        ClientAddressSearchService $service
    ) :JsonResponse
    {
        $response = null;

        try {
            $term = $request->route()->parameter('term');
            $clientaddress = $service->setTerm($term)->search();

            $response = $this->success(
                $clientaddress->count().' Client Address found',
                200,
                [
                    'client_address' =>  $clientaddress
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure('Search failed',422,['message'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }
}

