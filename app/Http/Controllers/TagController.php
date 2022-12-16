<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tag\TagDeleteRequest;
use App\Http\Requests\Tag\TagListRequest;
use App\Http\Requests\Tag\TagCreateRequest;
use App\Http\Requests\Tag\TagSearchRequest;
use App\Http\Requests\Tag\TagUpdateRequest;
use App\Http\Requests\Tag\TagViewRequest;
use App\Http\Traits\JsonResponseTrait;
use App\Services\Tag\TagDeleteAllService;
use App\Services\Tag\TagDeleteService;
use App\Services\Tag\TagListService;
use App\Services\Tag\TagSaveService;
use App\Services\Tag\TagSearchService;
use App\Services\Tag\TagViewService;
use Illuminate\Http\JsonResponse;

class TagController extends Controller
{
    use JsonResponseTrait;

        /**
     * @param TagListRequest $request
     * @param TagListService $service
     * @return JsonResponse
     */
    public function index(
        TagListRequest $request,
        TagListService $service
    ) :JsonResponse
    {
        $response =null;

        try {
            $response = $this->success(
                'Listing Tags',
                200,
                [
                    'Tags'=>$tagListService->getList(),
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Could not list Tag',
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
     * @param TagViewRequest $request
     * @param TagViewService $service
     * @return JsonResponse
     */
    public function show(
        TagViewRequest $request,
        TagViewService $service
    ) :JsonResponse
    {
        $response =null;

        try {
            $tag = $service->setIdentity($request->route()->parameter('id'))->get();

            $response = $this->success('Tag found',200,['Tag'=>$tag]);
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Could not list tag',
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
     * @param TagCreateRequest $request
     * @param TagSaveService $service
     * @return JsonResponse
     */
    public function create(
        TagCreateRequest $request,
        TagSaveService   $service
    ) :JsonResponse {
        try {
            $saved = $service->setProperties($request->all())->save();

            if(!$saved) {
                throw new \Exception('Could not save Tag');
            }

            $response = $this->success(
                'Tag Saved',
                200,
                [
                    'tag'=>$service->getEntity(false)
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Error creating [ModuleSingularLowerCase].',
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
     * @param TagUpdateRequest $request
     * @param TagSaveService $service
     * @return JsonResponse
     */
    public function update(
        TagUpdateRequest $request,
        TagSaveService   $service
    ) :JsonResponse {
        try {
            $saved = $service
                ->setIdentity($request->route()->parameter('id'))
                ->setProperties($request->all())->save();

            if(!$saved) {
                throw new \Exception('Could not update Tag');
            }

            $response = $this->success(
                'Tag Updated',
                200,
                [
                    'tag'=>$service->getEntity(false)
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Error updating tag.',
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
     * @param TagDeleteRequest $request
     * @param TagDeleteService $service
     * @return JsonResponse
     */
    public function delete(
        TagDeleteRequest $request,
        TagDeleteService $service
    ) :JsonResponse
    {
        $response = null;
        try {
            $deleted = $service->setIdentity($request->route()->parameter('id'))->delete();

            if(!$deleted){
                throw new \Exception('Could not delete record');
            }

            $response = $this->success('Tag deleted',200,['message'=>'deleted','tag'=>$request->all()]);
        } catch (\Throwable $throwable) {
            $response = $this->failure('Content delete failed',422,['message'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }

    /**
     * @param TagDeleteRequest $request
     * @param TagDeleteAllService $service
     * @return JsonResponse
     */
    public function deleteAll(
        TagDeleteRequest $request,
        TagDeleteAllService $service
    ) :JsonResponse
    {
        $response = null;

        try {
            $deleted = $service->truncate();

            if(!$deleted){
                throw new \Exception('Could not delete all Tag');
            }
            $response = $this->success(
              'Tag deleted',
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
     * @param TagSearchRequest $request
     * @param TagSearchService $service
     * @return JsonResponse
     */
    public function search(
        TagSearchRequest $request,
        TagSearchService $service
    ) :JsonResponse
    {
        $response = null;

        try {
            $term = $request->route()->parameter('term');
            $content = $service->setTerm($term)->search();

            $response = $this->success(
                $tag->count().' Tag found',
                200,
                [
                    'tag' =>  $tag
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure('Search failed',422,['message'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }
}

