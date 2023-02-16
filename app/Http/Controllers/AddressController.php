<?php

namespace App\Http\Controllers;

use App\Http\Requests\Address\AddressDeleteRequest;
use App\Http\Requests\Address\AddressListRequest;
use App\Http\Requests\Address\AddressCreateRequest;
use App\Http\Requests\Address\AddressSearchRequest;
use App\Http\Requests\Address\AddressUpdateRequest;
use App\Http\Requests\Address\AddressViewRequest;
use App\Http\Traits\JsonResponseTrait;
use App\Services\Address\AddressDeleteAllService;
use App\Services\Address\AddressDeleteService;
use App\Services\Address\AddressListService;
use App\Services\Address\AddressSaveService;
use App\Services\Address\AddressSearchService;
use App\Services\Address\AddressViewService;
use App\Services\ClientAddress\ClientAddressSaveService;
use Illuminate\Http\JsonResponse;

class AddressController extends Controller
{
    use JsonResponseTrait;

        /**
     * @param AddressListRequest $request
     * @param AddressListService $service
     * @return JsonResponse
     */
    public function index(
        AddressListRequest $request,
        AddressListService $service
    ) :JsonResponse
    {
        $response =null;

        try {
            $response = $this->success(
                'Listing Addresses',
                200,
                [
                    'Addresses'=>$service->getList(),
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Could not list Address',
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
     * @param AddressViewRequest $request
     * @param AddressViewService $service
     * @return JsonResponse
     */
    public function show(
        AddressViewRequest $request,
        AddressViewService $service
    ) :JsonResponse
    {
        $response =null;

        try {
            $address = $service->setIdentity($request->route()->parameter('id'))->get();

            $response = $this->success('Address found',200,['Address'=>$address]);
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Could not list address',
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
     * @param AddressCreateRequest $request
     * @param AddressSaveService $service
     * @param ClientAddressSaveService $clientAddressSaveService
     * @return JsonResponse
     */
    public function create(
        AddressCreateRequest $request,
        AddressSaveService   $service,
        ClientAddressSaveService $clientAddressSaveService
    ) :JsonResponse {
        try {
            $addressParams = $request->except('client_id');

            $saved = $service->setProperties($addressParams)->save();

            if(!$saved) {
                throw new \Exception('Could not save Address');
            }

            $clientId = $request->get('client_id',false);

            $address = $service->getEntity(false);

            if($clientId){
                $clientAddressSaveService
                    ->setProperties(['client_id'=>$clientId,'address_id'=>$address->id])
                    ->save();
            }

            $response = $this->success(
                'Address Saved',
                200,
                [
                    'address'=>$address
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Error creating address.',
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
     * @param AddressUpdateRequest $request
     * @param AddressSaveService $service
     * @return JsonResponse
     */
    public function update(
        AddressUpdateRequest $request,
        AddressSaveService   $service
    ) :JsonResponse {
        try {
            $saved = $service
                ->setIdentity($request->route()->parameter('id'))
                ->setProperties($request->all())->save();

            if(!$saved) {
                throw new \Exception('Could not update Address');
            }

            $response = $this->success(
                'Address Updated',
                200,
                [
                    'address'=>$service->getEntity(false)
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Error updating address.',
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
     * @param AddressDeleteRequest $request
     * @param AddressDeleteService $service
     * @return JsonResponse
     */
    public function delete(
        AddressDeleteRequest $request,
        AddressDeleteService $service
    ) :JsonResponse
    {
        $response = null;
        try {
            $deleted = $service->setIdentity($request->route()->parameter('id'))->delete();

            if(!$deleted){
                throw new \Exception('Could not delete record');
            }

            $response = $this->success('Address deleted',200,['message'=>'deleted','address'=>$request->all()]);
        } catch (\Throwable $throwable) {
            $response = $this->failure('Content delete failed',422,['message'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }

    /**
     * @param AddressDeleteRequest $request
     * @param AddressDeleteAllService $service
     * @return JsonResponse
     */
    public function deleteAll(
        AddressDeleteRequest $request,
        AddressDeleteAllService $service
    ) :JsonResponse
    {
        $response = null;

        try {
            $deleted = $service->truncate();

            if(!$deleted){
                throw new \Exception('Could not delete all Addresses');
            }
            $response = $this->success(
              'Address deleted',
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
     * @param AddressSearchRequest $request
     * @param AddressSearchService $service
     * @return JsonResponse
     */
    public function search(
        AddressSearchRequest $request,
        AddressSearchService $service
    ) :JsonResponse
    {
        $response = null;

        try {
            $term = $request->route()->parameter('term');
            $address = $service->setTerm($term)->search();

            $response = $this->success(
                $address->count().' Address found',
                200,
                [
                    'address' =>  $address
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure('Search failed',422,['message'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }
}

