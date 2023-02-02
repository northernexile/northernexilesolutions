<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExperienceSkill\ExperienceSkillDeleteRequest;
use App\Http\Requests\ExperienceSkill\ExperienceSkillListRequest;
use App\Http\Requests\ExperienceSkill\ExperienceSkillCreateRequest;
use App\Http\Requests\ExperienceSkill\ExperienceSkillSearchRequest;
use App\Http\Requests\ExperienceSkill\ExperienceSkillUpdateRequest;
use App\Http\Requests\ExperienceSkill\ExperienceSkillViewRequest;
use App\Http\Traits\JsonResponseTrait;
use App\Services\ExperienceSkill\ExperienceSkillDeleteAllService;
use App\Services\ExperienceSkill\ExperienceSkillDeleteService;
use App\Services\ExperienceSkill\ExperienceSkillListService;
use App\Services\ExperienceSkill\ExperienceSkillSaveService;
use App\Services\ExperienceSkill\ExperienceSkillSearchService;
use App\Services\ExperienceSkill\ExperienceSkillViewService;
use Illuminate\Http\JsonResponse;

class ExperienceSkillController extends Controller
{
    use JsonResponseTrait;

        /**
     * @param ExperienceSkillListRequest $request
     * @param ExperienceSkillListService $service
     * @return JsonResponse
     */
    public function index(
        ExperienceSkillListRequest $request,
        ExperienceSkillListService $service
    ) :JsonResponse
    {
        $response =null;

        try {
            $response = $this->success(
                'Listing Technologies',
                200,
                [
                    'technologies'=>$service->getList(),
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Could not list Technologies',
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
     * @param ExperienceSkillViewRequest $request
     * @param ExperienceSkillViewService $service
     * @return JsonResponse
     */
    public function show(
        ExperienceSkillViewRequest $request,
        ExperienceSkillViewService $service
    ) :JsonResponse
    {
        $response =null;

        try {
            $technology = $service->setIdentity($request->route()->parameter('id'))->get();

            $response = $this->success('Technology found',200,['technology'=>$technology]);
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Could not show technology',
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
     * @param ExperienceSkillCreateRequest $request
     * @param ExperienceSkillSaveService $service
     * @return JsonResponse
     */
    public function create(
        ExperienceSkillCreateRequest $request,
        ExperienceSkillSaveService   $service
    ) :JsonResponse {
        try {
            $saved = $service->setProperties($request->all())->save();

            if(!$saved) {
                throw new \Exception('Could not save technology');
            }

            $response = $this->success(
                'ExperienceSkill Saved',
                200,
                [
                    'technology'=>$service->getEntity(false)
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Error creating technology.',
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
     * @param ExperienceSkillUpdateRequest $request
     * @param ExperienceSkillSaveService $service
     * @return JsonResponse
     */
    public function update(
        ExperienceSkillUpdateRequest $request,
        ExperienceSkillSaveService   $service
    ) :JsonResponse {
        try {
            $saved = $service
                ->setIdentity($request->route()->parameter('id'))
                ->setProperties($request->all())->save();

            if(!$saved) {
                throw new \Exception('Could not update technology');
            }

            $response = $this->success(
                'Technology Updated',
                200,
                [
                    'technology'=>$service->getEntity(false)
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Error updating technology.',
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
     * @param ExperienceSkillDeleteRequest $request
     * @param ExperienceSkillDeleteService $service
     * @return JsonResponse
     */
    public function delete(
        ExperienceSkillDeleteRequest $request,
        ExperienceSkillDeleteService $service
    ) :JsonResponse
    {
        $response = null;
        try {
            $deleted = $service->setIdentity($request->route()->parameter('id'))->delete();

            if(!$deleted){
                throw new \Exception('Could not delete record');
            }

            $response = $this->success('Technology deleted',200,['message'=>'deleted','technology'=>$request->all()]);
        } catch (\Throwable $throwable) {
            $response = $this->failure('Technology delete failed',422,['message'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }

    /**
     * @param ExperienceSkillDeleteRequest $request
     * @param ExperienceSkillDeleteAllService $service
     * @return JsonResponse
     */
    public function deleteAll(
        ExperienceSkillDeleteRequest $request,
        ExperienceSkillDeleteAllService $service
    ) :JsonResponse
    {
        $response = null;

        try {
            $deleted = $service->truncate();

            if(!$deleted){
                throw new \Exception('Could not delete all technologies');
            }
            $response = $this->success(
              'Technologies deleted',
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
     * @param ExperienceSkillSearchRequest $request
     * @param ExperienceSkillSearchService $service
     * @return JsonResponse
     */
    public function search(
        ExperienceSkillSearchRequest $request,
        ExperienceSkillSearchService $service
    ) :JsonResponse
    {
        $response = null;

        try {
            $term = $request->route()->parameter('term');
            $technologies = $service->setTerm($term)->search();

            $response = $this->success(
                $technologies->count().' technologies found',
                200,
                [
                    'technologies' =>  $technologies
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure('Search failed',422,['message'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }
}

