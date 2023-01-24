<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contact\ContactDeleteRequest;
use App\Http\Requests\Contact\ContactListRequest;
use App\Http\Requests\Contact\ContactCreateRequest;
use App\Http\Requests\Contact\ContactSearchRequest;
use App\Http\Requests\Contact\ContactUpdateRequest;
use App\Http\Requests\Contact\ContactViewRequest;
use App\Http\Traits\JsonResponseTrait;
use App\Services\Contact\ContactDeleteAllService;
use App\Services\Contact\ContactDeleteService;
use App\Services\Contact\ContactListService;
use App\Services\Contact\ContactSaveService;
use App\Services\Contact\ContactSearchService;
use App\Services\Contact\ContactViewService;
use Illuminate\Http\JsonResponse;

class ContactController extends Controller
{
    use JsonResponseTrait;

        /**
     * @param ContactListRequest $request
     * @param ContactListService $service
     * @return JsonResponse
     */
    public function index(
        ContactListRequest $request,
        ContactListService $service
    ) :JsonResponse
    {
        $response =null;

        try {
            $response = $this->success(
                'Listing Contacts',
                200,
                [
                    'Contacts'=>$service->getList(),
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Could not list Contacts',
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
     * @param ContactViewRequest $request
     * @param ContactViewService $service
     * @return JsonResponse
     */
    public function show(
        ContactViewRequest $request,
        ContactViewService $service
    ) :JsonResponse
    {
        $response =null;

        try {
            $contact = $service->setIdentity($request->route()->parameter('id'))->get();

            $response = $this->success('Contact found',200,['Contact'=>$contact]);
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Could not list contact',
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
     * @param ContactCreateRequest $request
     * @param ContactSaveService $service
     * @return JsonResponse
     */
    public function create(
        ContactCreateRequest $request,
        ContactSaveService   $service
    ) :JsonResponse {
        try {
            $saved = $service->setProperties($request->all())->save();

            if(!$saved) {
                throw new \Exception('Could not save Contact');
            }

            $response = $this->success(
                'Contact Saved',
                200,
                [
                    'contact'=>$service->getEntity(false)
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Error creating contact.',
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
     * @param ContactUpdateRequest $request
     * @param ContactSaveService $service
     * @return JsonResponse
     */
    public function update(
        ContactUpdateRequest $request,
        ContactSaveService   $service
    ) :JsonResponse {
        try {
            $saved = $service
                ->setIdentity($request->route()->parameter('id'))
                ->setProperties($request->all())->save();

            if(!$saved) {
                throw new \Exception('Could not update Contact');
            }

            $response = $this->success(
                'Contact Updated',
                200,
                [
                    'contact'=>$service->getEntity(false)
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Error updating contact.',
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
     * @param ContactDeleteRequest $request
     * @param ContactDeleteService $service
     * @return JsonResponse
     */
    public function delete(
        ContactDeleteRequest $request,
        ContactDeleteService $service
    ) :JsonResponse
    {
        $response = null;
        try {
            $deleted = $service->setIdentity($request->route()->parameter('id'))->delete();

            if(!$deleted){
                throw new \Exception('Could not delete record');
            }

            $response = $this->success('Contact deleted',200,['message'=>'deleted','contact'=>$request->all()]);
        } catch (\Throwable $throwable) {
            $response = $this->failure('Content delete failed',422,['message'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }

    /**
     * @param ContactDeleteRequest $request
     * @param ContactDeleteAllService $service
     * @return JsonResponse
     */
    public function deleteAll(
        ContactDeleteRequest $request,
        ContactDeleteAllService $service
    ) :JsonResponse
    {
        $response = null;

        try {
            $deleted = $service->truncate();

            if(!$deleted){
                throw new \Exception('Could not delete all Contact');
            }
            $response = $this->success(
              'Contact deleted',
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
     * @param ContactSearchRequest $request
     * @param ContactSearchService $service
     * @return JsonResponse
     */
    public function search(
        ContactSearchRequest $request,
        ContactSearchService $service
    ) :JsonResponse
    {
        $response = null;

        try {
            $term = $request->route()->parameter('term');
            $content = $service->setTerm($term)->search();

            $response = $this->success(
                $contact->count().' Contact found',
                200,
                [
                    'contact' =>  $contact
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure('Search failed',422,['message'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }
}

