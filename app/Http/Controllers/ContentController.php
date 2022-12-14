<?php

namespace App\Http\Controllers;

use App\Http\Requests\Content\ContentDeleteRequest;
use App\Http\Requests\Content\ContentListRequest;
use App\Http\Requests\Content\ContentCreateRequest;
use App\Http\Requests\Content\ContentSearchRequest;
use App\Http\Requests\Content\ContentUpdateRequest;
use App\Http\Requests\Content\ContentViewRequest;
use App\Http\Traits\JsonResponseTrait;
use App\Services\Content\ContentDeleteAllService;
use App\Services\Content\ContentDeleteService;
use App\Services\Content\ContentListService;
use App\Services\Content\ContentSaveService;
use App\Services\Content\ContentSearchService;
use App\Services\Content\ContentViewService;
use Illuminate\Http\JsonResponse;

class ContentController extends Controller
{
    use JsonResponseTrait;

    /**
     * @param ContentListRequest $request
     * @param ContentListService $service
     * @return JsonResponse
     */
    public function index(
        ContentListRequest $request,
        ContentListService $service
    ) :JsonResponse
    {
        $response =null;

        try {
            $service->getList();
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Could not list content',
                422,
                [
                    'message'=>$throwable->getMessage()
                ]
            );
        } finally {
            return $response;
        }
    }    /**
     * @param ContentViewRequest $request
     * @param ContentViewService $service
     * @return JsonResponse
     */
    public function show(
        ContentViewRequest $request,
        ContentViewService $service
    ) :JsonResponse
    {
        $response =null;

        try {
            $content = $service->setIdentity($request->route()->parameter('id'))->get();

            $response = $this->success('Content found',200,['content'=>$content]);
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Could not list content',
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
     * @param ContentCreateRequest $request
     * @param ContentSaveService $service
     * @return JsonResponse
     */
    public function create(
        ContentCreateRequest $request,
        ContentSaveService   $service
    ) :JsonResponse {
        try {
            $saved = $service->setProperties($request->all())->save();

            if(!$saved) {
                throw new \Exception('Could not save Content');
            }

            $response = $this->success(
                'Content Saved',
                200,
                [
                    'content'=>$service->getEntity(false)
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Error creating content.',
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
     * @param ContentUpdateRequest $request
     * @param ContentSaveService $service
     * @return JsonResponse
     */
    public function update(
        ContentUpdateRequest $request,
        ContentSaveService   $service
    ) :JsonResponse {
        try {
            $saved = $service
                ->setIdentity($request->route()->parameter('id'))
                ->setProperties($request->all())->save();

            if(!$saved) {
                throw new \Exception('Could not update Content');
            }

            $response = $this->success(
                'Content Updated',
                200,
                [
                    'content'=>$service->getEntity(false)
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Error updating content.',
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
     * @param ContentDeleteRequest $request
     * @param ContentDeleteService $service
     * @return JsonResponse
     */
    public function delete(
        ContentDeleteRequest $request,
        ContentDeleteService $service
    ) :JsonResponse
    {
        $response = null;
        try {
            $deleted = $service->setIdentity($request->route()->parameter('id'))->delete();

            if(!$deleted){
                throw new \Exception('Could not delete record');
            }

            $response = $this->success('Content deleted',200,['message'=>'deleted','content'=>$request->all()]);
        } catch (\Throwable $throwable) {
            $response = $this->failure('Content delete failed',422,['message'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }

    /**
     * @param ContentDeleteRequest $request
     * @param ContentDeleteAllService $service
     * @return JsonResponse
     */
    public function deleteAll(
        ContentDeleteRequest $request,
        ContentDeleteAllService $service
    ) :JsonResponse
    {
        $response = null;

        try {
            $deleted = $service->truncate();

            if(!$deleted){
                throw new \Exception('Could not delete all content');
            }
            $response = $this->success(
              'Content deleted',
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
     * @param ContentSearchRequest $request
     * @param ContentSearchService $service
     * @return JsonResponse
     */
    public function search(
        ContentSearchRequest $request,
        ContentSearchService $service
    ) :JsonResponse
    {
        $response = null;

        try {
            $term = $request->route()->parameter('term');
            $content = $service->setTerm($term)->search();

            $response = $this->success(
                $content->count().' Content found',
                200,
                [
                    'content' =>  $content
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure('Search failed',422,['message'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }
}
