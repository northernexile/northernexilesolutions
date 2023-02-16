<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientInvoiceItem\ClientInvoiceItemDeleteRequest;
use App\Http\Requests\ClientInvoiceItem\ClientInvoiceItemListRequest;
use App\Http\Requests\ClientInvoiceItem\ClientInvoiceItemCreateRequest;
use App\Http\Requests\ClientInvoiceItem\ClientInvoiceItemSearchRequest;
use App\Http\Requests\ClientInvoiceItem\ClientInvoiceItemUpdateRequest;
use App\Http\Requests\ClientInvoiceItem\ClientInvoiceItemViewRequest;
use App\Http\Traits\JsonResponseTrait;
use App\Services\ClientInvoiceItem\ClientInvoiceItemDeleteAllService;
use App\Services\ClientInvoiceItem\ClientInvoiceItemDeleteService;
use App\Services\ClientInvoiceItem\ClientInvoiceItemListService;
use App\Services\ClientInvoiceItem\ClientInvoiceItemSaveService;
use App\Services\ClientInvoiceItem\ClientInvoiceItemSearchService;
use App\Services\ClientInvoiceItem\ClientInvoiceItemViewService;
use Illuminate\Http\JsonResponse;

class ClientInvoiceItemController extends Controller
{
    use JsonResponseTrait;

        /**
     * @param ClientInvoiceItemListRequest $request
     * @param ClientInvoiceItemListService $service
     * @return JsonResponse
     */
    public function index(
        ClientInvoiceItemListRequest $request,
        ClientInvoiceItemListService $service
    ) :JsonResponse
    {
        $response =null;

        try {
            $response = $this->success(
                'Listing Client Invoice Items',
                200,
                [
                    'client_invoice_items'=>$service->getList(),
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Could not list Client Invoice Items',
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
     * @param ClientInvoiceItemViewRequest $request
     * @param ClientInvoiceItemViewService $service
     * @return JsonResponse
     */
    public function show(
        ClientInvoiceItemViewRequest $request,
        ClientInvoiceItemViewService $service
    ) :JsonResponse
    {
        $response =null;

        try {
            $clientInvoiceItem = $service->setIdentity($request->route()->parameter('id'))->get();

            $response = $this->success('Client Invoice Item found',200,['client_invoice_item'=>$clientInvoiceItem]);
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Could not view client invoice item',
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
     * @param ClientInvoiceItemCreateRequest $request
     * @param ClientInvoiceItemSaveService $service
     * @return JsonResponse
     */
    public function create(
        ClientInvoiceItemCreateRequest $request,
        ClientInvoiceItemSaveService   $service
    ) :JsonResponse {
        try {
            $saved = $service->setProperties($request->all())->save();

            if(!$saved) {
                throw new \Exception('Could not save ClientInvoiceItem');
            }

            $response = $this->success(
                'ClientInvoiceItem Saved',
                200,
                [
                    'clientinvoiceitem'=>$service->getEntity(false)
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Error creating clientinvoiceitem.',
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
     * @param ClientInvoiceItemUpdateRequest $request
     * @param ClientInvoiceItemSaveService $service
     * @return JsonResponse
     */
    public function update(
        ClientInvoiceItemUpdateRequest $request,
        ClientInvoiceItemSaveService   $service
    ) :JsonResponse {
        try {
            $saved = $service
                ->setIdentity($request->route()->parameter('id'))
                ->setProperties($request->all())->save();

            if(!$saved) {
                throw new \Exception('Could not update Client Invoice Item');
            }

            $response = $this->success(
                'Client Invoice Item Updated',
                200,
                [
                    'client_invoice_item'=>$service->getEntity(false)
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Error updating client invoice item.',
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
     * @param ClientInvoiceItemDeleteRequest $request
     * @param ClientInvoiceItemDeleteService $service
     * @return JsonResponse
     */
    public function delete(
        ClientInvoiceItemDeleteRequest $request,
        ClientInvoiceItemDeleteService $service
    ) :JsonResponse
    {
        $response = null;
        try {
            $deleted = $service->setIdentity($request->route()->parameter('id'))->delete();

            if(!$deleted){
                throw new \Exception('Could not delete record');
            }

            $response = $this->success('Client Invoice Item deleted',200,['message'=>'deleted','client_invoice_item'=>$request->all()]);
        } catch (\Throwable $throwable) {
            $response = $this->failure('Content delete failed',422,['message'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }

    /**
     * @param ClientInvoiceItemDeleteRequest $request
     * @param ClientInvoiceItemDeleteAllService $service
     * @return JsonResponse
     */
    public function deleteAll(
        ClientInvoiceItemDeleteRequest $request,
        ClientInvoiceItemDeleteAllService $service
    ) :JsonResponse
    {
        $response = null;

        try {
            $deleted = $service->truncate();

            if(!$deleted){
                throw new \Exception('Could not delete all Client Invoice Items');
            }
            $response = $this->success(
              'Client Invoice Item deleted',
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
     * @param ClientInvoiceItemSearchRequest $request
     * @param ClientInvoiceItemSearchService $service
     * @return JsonResponse
     */
    public function search(
        ClientInvoiceItemSearchRequest $request,
        ClientInvoiceItemSearchService $service
    ) :JsonResponse
    {
        $response = null;

        try {
            $term = $request->route()->parameter('term');
            $clientInvoiceItem = $service->setTerm($term)->search();

            $response = $this->success(
                $clientInvoiceItem->count().' Client Invoice Item found',
                200,
                [
                    'client_invoice_item' =>  $clientInvoiceItem
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure('Search failed',422,['message'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }
}

