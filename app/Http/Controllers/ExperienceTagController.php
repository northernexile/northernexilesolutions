<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExperienceTag\ExperienceTagDeleteRequest;
use App\Http\Requests\ExperienceTag\ExperienceTagListRequest;
use App\Http\Requests\ExperienceTag\ExperienceTagCreateRequest;
use App\Http\Requests\ExperienceTag\ExperienceTagSearchRequest;
use App\Http\Requests\ExperienceTag\ExperienceTagToggleRequest;
use App\Http\Requests\ExperienceTag\ExperienceTagUpdateRequest;
use App\Http\Requests\ExperienceTag\ExperienceTagViewRequest;
use App\Http\Traits\JsonResponseTrait;
use App\Services\ExperienceTag\ExperienceTagDeleteAllService;
use App\Services\ExperienceTag\ExperienceTagDeleteService;
use App\Services\ExperienceTag\ExperienceTagListService;
use App\Services\ExperienceTag\ExperienceTagSaveService;
use App\Services\ExperienceTag\ExperienceTagSearchService;
use App\Services\ExperienceTag\ExperienceTagToggleService;
use App\Services\ExperienceTag\ExperienceTagViewService;
use Illuminate\Http\JsonResponse;

class ExperienceTagController extends Controller
{
    use JsonResponseTrait;

        /**
     * @param ExperienceTagListRequest $request
     * @param ExperienceTagListService $service
     * @return JsonResponse
     */
    public function index(
        ExperienceTagListRequest $request,
        ExperienceTagListService $service
    ) :JsonResponse
    {
        $response =null;

        try {
            $response = $this->success(
                'Listing Experience Tags',
                200,
                [
                    'experience_tags'=>$service->getList(),
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Could not list Experience Tags',
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
     * @param ExperienceTagViewRequest $request
     * @param ExperienceTagViewService $service
     * @return JsonResponse
     */
    public function show(
        ExperienceTagViewRequest $request,
        ExperienceTagViewService $service
    ) :JsonResponse
    {
        $response =null;

        try {
            $tag = $service->setIdentity($request->route()->parameter('id'))->get();

            $response = $this->success('ExperienceTag found',200,['experience_tags'=>$tag]);
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Could not find experience tag',
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
     * @param ExperienceTagCreateRequest $request
     * @param ExperienceTagSaveService $service
     * @return JsonResponse
     */
    public function create(
        ExperienceTagCreateRequest $request,
        ExperienceTagSaveService   $service
    ) :JsonResponse {
        try {
            $saved = $service->setProperties($request->all())->save();

            if(!$saved) {
                throw new \Exception('Could not save experience tag');
            }

            $response = $this->success(
                'Tag Saved',
                200,
                [
                    'experience_tag'=>$service->getEntity(false)
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Error creating experience tag.',
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
     * @param ExperienceTagUpdateRequest $request
     * @param ExperienceTagSaveService $service
     * @return JsonResponse
     */
    public function update(
        ExperienceTagUpdateRequest $request,
        ExperienceTagSaveService   $service
    ) :JsonResponse {
        try {
            $saved = $service
                ->setIdentity($request->route()->parameter('id'))
                ->setProperties($request->all())->save();

            if(!$saved) {
                throw new \Exception('Could not update Experience Tag');
            }

            $response = $this->success(
                'Experience Tag Updated',
                200,
                [
                    'experience_tag'=>$service->getEntity(false)
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Error updating experience tag.',
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
     * @param ExperienceTagDeleteRequest $request
     * @param ExperienceTagDeleteService $service
     * @return JsonResponse
     */
    public function delete(
        ExperienceTagDeleteRequest $request,
        ExperienceTagDeleteService $service
    ) :JsonResponse
    {
        $response = null;
        try {
            $deleted = $service->setIdentity($request->route()->parameter('id'))->delete();

            if(!$deleted){
                throw new \Exception('Could not delete record');
            }

            $response = $this->success('Experience Tag deleted',200,['message'=>'deleted','experience_tag'=>$request->all()]);
        } catch (\Throwable $throwable) {
            $response = $this->failure('Tag delete failed',422,['message'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }

    /**
     * @param ExperienceTagDeleteRequest $request
     * @param ExperienceTagDeleteAllService $service
     * @return JsonResponse
     */
    public function deleteAll(
        ExperienceTagDeleteRequest $request,
        ExperienceTagDeleteAllService $service
    ) :JsonResponse
    {
        $response = null;

        try {
            $deleted = $service->truncate();

            if(!$deleted){
                throw new \Exception('Could not delete all Experience Tags');
            }
            $response = $this->success(
              'Experience Tag deleted',
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
     * @param ExperienceTagSearchRequest $request
     * @param ExperienceTagSearchService $service
     * @return JsonResponse
     */
    public function search(
        ExperienceTagSearchRequest $request,
        ExperienceTagSearchService $service
    ) :JsonResponse
    {
        $response = null;

        try {
            $term = $request->route()->parameter('term');
            $tag = $service->setTerm($term)->search();

            $response = $this->success(
                $tag->count().' Experience Tags found',
                200,
                [
                    'experience_tag' =>  $tag
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure('Search failed',422,['message'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }

    /**
     * @param ExperienceTagToggleRequest $request
     * @param ExperienceTagToggleService $service
     * @return JsonResponse
     */
    public function toggle(
        ExperienceTagToggleRequest $request,
        ExperienceTagToggleService $service
    ) :JsonResponse
    {
        $response = null;

        try {
            $result = $service
                ->setExperienceId($request->get('experience_id'))
                ->setTagId($request->get('tag_id'))
                ->toggle();

            $response = $this->success('Toggled item',200,['tag'=>$result]);
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Could not toggle tag for experience',
                422,
                [
                    'message'=>$throwable->getMessage()
                ]
            );
        } finally {
            return $response;
        }
    }
}

