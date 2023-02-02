<?php

namespace App\Http\Controllers;

use App\Http\Requests\[ModuleSingular]\[ModuleSingular]DeleteRequest;
use App\Http\Requests\[ModuleSingular]\[ModuleSingular]ListRequest;
use App\Http\Requests\[ModuleSingular]\[ModuleSingular]CreateRequest;
use App\Http\Requests\[ModuleSingular]\[ModuleSingular]SearchRequest;
use App\Http\Requests\[ModuleSingular]\[ModuleSingular]UpdateRequest;
use App\Http\Requests\[ModuleSingular]\[ModuleSingular]ViewRequest;
use App\Http\Traits\JsonResponseTrait;
use App\Services\[ModuleSingular]\[ModuleSingular]DeleteAllService;
use App\Services\[ModuleSingular]\[ModuleSingular]DeleteService;
use App\Services\[ModuleSingular]\[ModuleSingular]ListService;
use App\Services\[ModuleSingular]\[ModuleSingular]SaveService;
use App\Services\[ModuleSingular]\[ModuleSingular]SearchService;
use App\Services\[ModuleSingular]\[ModuleSingular]ViewService;
use Illuminate\Http\JsonResponse;

class [ModuleSingular]Controller extends Controller
{
    use JsonResponseTrait;

        /**
     * @param [ModuleSingular]ListRequest $request
     * @param [ModuleSingular]ListService $service
     * @return JsonResponse
     */
    public function index(
        [ModuleSingular]ListRequest $request,
        [ModuleSingular]ListService $service
    ) :JsonResponse
    {
        $response =null;

        try {
            $response = $this->success(
                'Listing [ModulePlural]',
                200,
                [
                    '[ModulePlural]'=>$service->getList(),
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Could not list [ModuleSingular]',
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
     * @param [ModuleSingular]ViewRequest $request
     * @param [ModuleSingular]ViewService $service
     * @return JsonResponse
     */
    public function show(
        [ModuleSingular]ViewRequest $request,
        [ModuleSingular]ViewService $service
    ) :JsonResponse
    {
        $response =null;

        try {
            $[ModuleSingularLowercase] = $service->setIdentity($request->route()->parameter('id'))->get();

            $response = $this->success('[ModuleSingular] found',200,['[ModuleSingular]'=>$[ModuleSingularLowercase]]);
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Could not list [ModuleSingularLowercase]',
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
     * @param [ModuleSingular]CreateRequest $request
     * @param [ModuleSingular]SaveService $service
     * @return JsonResponse
     */
    public function create(
        [ModuleSingular]CreateRequest $request,
        [ModuleSingular]SaveService   $service
    ) :JsonResponse {
        try {
            $saved = $service->setProperties($request->all())->save();

            if(!$saved) {
                throw new \Exception('Could not save [ModuleSingular]');
            }

            $response = $this->success(
                '[ModuleSingular] Saved',
                200,
                [
                    '[ModuleSingularLowercase]'=>$service->getEntity(false)
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Error creating [ModuleSingularLowercase].',
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
     * @param [ModuleSingular]UpdateRequest $request
     * @param [ModuleSingular]SaveService $service
     * @return JsonResponse
     */
    public function update(
        [ModuleSingular]UpdateRequest $request,
        [ModuleSingular]SaveService   $service
    ) :JsonResponse {
        try {
            $saved = $service
                ->setIdentity($request->route()->parameter('id'))
                ->setProperties($request->all())->save();

            if(!$saved) {
                throw new \Exception('Could not update [ModuleSingular]');
            }

            $response = $this->success(
                '[ModuleSingular] Updated',
                200,
                [
                    '[ModuleSingularLowercase]'=>$service->getEntity(false)
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Error updating [ModuleSingularLowercase].',
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
     * @param [ModuleSingular]DeleteRequest $request
     * @param [ModuleSingular]DeleteService $service
     * @return JsonResponse
     */
    public function delete(
        [ModuleSingular]DeleteRequest $request,
        [ModuleSingular]DeleteService $service
    ) :JsonResponse
    {
        $response = null;
        try {
            $deleted = $service->setIdentity($request->route()->parameter('id'))->delete();

            if(!$deleted){
                throw new \Exception('Could not delete record');
            }

            $response = $this->success('[ModuleSingular] deleted',200,['message'=>'deleted','[ModuleSingularLowercase]'=>$request->all()]);
        } catch (\Throwable $throwable) {
            $response = $this->failure('Content delete failed',422,['message'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }

    /**
     * @param [ModuleSingular]DeleteRequest $request
     * @param [ModuleSingular]DeleteAllService $service
     * @return JsonResponse
     */
    public function deleteAll(
        [ModuleSingular]DeleteRequest $request,
        [ModuleSingular]DeleteAllService $service
    ) :JsonResponse
    {
        $response = null;

        try {
            $deleted = $service->truncate();

            if(!$deleted){
                throw new \Exception('Could not delete all [ModuleSingular]');
            }
            $response = $this->success(
              '[ModuleSingular] deleted',
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
     * @param [ModuleSingular]SearchRequest $request
     * @param [ModuleSingular]SearchService $service
     * @return JsonResponse
     */
    public function search(
        [ModuleSingular]SearchRequest $request,
        [ModuleSingular]SearchService $service
    ) :JsonResponse
    {
        $response = null;

        try {
            $term = $request->route()->parameter('term');
            $[ModuleSingularLowercase] = $service->setTerm($term)->search();

            $response = $this->success(
                $[ModuleSingularLowercase]->count().' [ModuleSingular] found',
                200,
                [
                    '[ModuleSingularLowercase]' =>  $[ModuleSingularLowercase]
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure('Search failed',422,['message'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }
}

