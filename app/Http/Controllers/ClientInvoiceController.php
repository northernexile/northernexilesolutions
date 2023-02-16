<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientInvoice\ClientInvoiceDeleteRequest;
use App\Http\Requests\ClientInvoice\ClientInvoiceListRequest;
use App\Http\Requests\ClientInvoice\ClientInvoiceCreateRequest;
use App\Http\Requests\ClientInvoice\ClientInvoiceSearchRequest;
use App\Http\Requests\ClientInvoice\ClientInvoiceUpdateRequest;
use App\Http\Requests\ClientInvoice\ClientInvoiceViewRequest;
use App\Http\Traits\JsonResponseTrait;
use App\Services\ClientInvoice\ClientInvoiceDeleteAllService;
use App\Services\ClientInvoice\ClientInvoiceDeleteService;
use App\Services\ClientInvoice\ClientInvoiceListService;
use App\Services\ClientInvoice\ClientInvoiceSaveService;
use App\Services\ClientInvoice\ClientInvoiceSearchService;
use App\Services\ClientInvoice\ClientInvoiceViewService;
use Illuminate\Http\JsonResponse;

class ClientInvoiceController extends Controller
{
    use JsonResponseTrait;

        /**
     * @param ClientInvoiceListRequest $request
     * @param ClientInvoiceListService $service
     * @return JsonResponse
     */
    public function index(
        ClientInvoiceListRequest $request,
        ClientInvoiceListService $service
    ) :JsonResponse
    {
        $response =null;

        try {
            $response = $this->success(
                'Listing Client Invoices',
                200,
                [
                    'client_invoices'=>$service->getList(),
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Could not list Client Invoices',
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
     * @param ClientInvoiceViewRequest $request
     * @param ClientInvoiceViewService $service
     * @return JsonResponse
     */
    public function show(
        ClientInvoiceViewRequest $request,
        ClientInvoiceViewService $service
    ) :JsonResponse
    {
        $response =null;

        try {
            $clientInvoice = $service->setIdentity($request->route()->parameter('id'))->get();

            $response = $this->success('ClientInvoice found',200,['client_nvoice'=>$clientInvoice]);
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Could not view client invoice',
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
     * @param ClientInvoiceCreateRequest $request
     * @param ClientInvoiceSaveService $service
     * @return JsonResponse
     */
    public function create(
        ClientInvoiceCreateRequest $request,
        ClientInvoiceSaveService   $service
    ) :JsonResponse {
        try {
            $saved = $service->setProperties($request->all())->save();

            if(!$saved) {
                throw new \Exception('Could not save ClientInvoice');
            }

            $response = $this->success(
                'ClientInvoice Saved',
                200,
                [
                    'client_invoice'=>$service->getEntity(false)
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Error creating client invoice.',
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
     * @param ClientInvoiceUpdateRequest $request
     * @param ClientInvoiceSaveService $service
     * @return JsonResponse
     */
    public function update(
        ClientInvoiceUpdateRequest $request,
        ClientInvoiceSaveService   $service
    ) :JsonResponse {
        try {
            $saved = $service
                ->setIdentity($request->route()->parameter('id'))
                ->setProperties($request->all())->save();

            if(!$saved) {
                throw new \Exception('Could not update Client Invoice');
            }

            $response = $this->success(
                'Client Invoice Updated',
                200,
                [
                    'client_invoice'=>$service->getEntity(false)
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Error updating client_invoice.',
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
     * @param ClientInvoiceDeleteRequest $request
     * @param ClientInvoiceDeleteService $service
     * @return JsonResponse
     */
    public function delete(
        ClientInvoiceDeleteRequest $request,
        ClientInvoiceDeleteService $service
    ) :JsonResponse
    {
        $response = null;
        try {
            $deleted = $service->setIdentity($request->route()->parameter('id'))->delete();

            if(!$deleted){
                throw new \Exception('Could not delete record');
            }

            $response = $this->success('Client Invoice deleted',200,['message'=>'deleted','client_invoice'=>$request->all()]);
        } catch (\Throwable $throwable) {
            $response = $this->failure('Content delete failed',422,['message'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }

    /**
     * @param ClientInvoiceDeleteRequest $request
     * @param ClientInvoiceDeleteAllService $service
     * @return JsonResponse
     */
    public function deleteAll(
        ClientInvoiceDeleteRequest $request,
        ClientInvoiceDeleteAllService $service
    ) :JsonResponse
    {
        $response = null;

        try {
            $deleted = $service->truncate();

            if(!$deleted){
                throw new \Exception('Could not delete all Client Invoice');
            }
            $response = $this->success(
              'Client Invoice deleted',
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
     * @param ClientInvoiceSearchRequest $request
     * @param ClientInvoiceSearchService $service
     * @return JsonResponse
     */
    public function search(
        ClientInvoiceSearchRequest $request,
        ClientInvoiceSearchService $service
    ) :JsonResponse
    {
        $response = null;

        try {
            $term = $request->route()->parameter('term');
            $clientInvoice = $service->setTerm($term)->search();

            $response = $this->success(
                $clientInvoice->count().' Client Invoice found',
                200,
                [
                    'client_invoice' =>  $clientInvoice
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure('Search failed',422,['message'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }
}

