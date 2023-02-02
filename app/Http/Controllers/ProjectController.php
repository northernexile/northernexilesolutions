<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project\ProjectDeleteRequest;
use App\Http\Requests\Project\ProjectListRequest;
use App\Http\Requests\Project\ProjectCreateRequest;
use App\Http\Requests\Project\ProjectSearchRequest;
use App\Http\Requests\Project\ProjectUpdateRequest;
use App\Http\Requests\Project\ProjectViewRequest;
use App\Http\Traits\JsonResponseTrait;
use App\Services\Project\ProjectDeleteAllService;
use App\Services\Project\ProjectDeleteService;
use App\Services\Project\ProjectListService;
use App\Services\Project\ProjectSaveService;
use App\Services\Project\ProjectSearchService;
use App\Services\Project\ProjectViewService;
use Illuminate\Http\JsonResponse;

class ProjectController extends Controller
{
    use JsonResponseTrait;

        /**
     * @param ProjectListRequest $request
     * @param ProjectListService $service
     * @return JsonResponse
     */
    public function index(
        ProjectListRequest $request,
        ProjectListService $service
    ) :JsonResponse
    {
        $response =null;

        try {
            $response = $this->success(
                'Listing Projects',
                200,
                [
                    'Projects'=>$service->getListByExperienceId(
                        $request->get('experience_id')
                    ),
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Could not list Project',
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
     * @param ProjectViewRequest $request
     * @param ProjectViewService $service
     * @return JsonResponse
     */
    public function show(
        ProjectViewRequest $request,
        ProjectViewService $service
    ) :JsonResponse
    {
        $response =null;

        try {
            $project = $service->setIdentity($request->route()->parameter('id'))->get();

            $response = $this->success('Project found',200,['Project'=>$project]);
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Could not list project',
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
     * @param ProjectCreateRequest $request
     * @param ProjectSaveService $service
     * @return JsonResponse
     */
    public function create(
        ProjectCreateRequest $request,
        ProjectSaveService   $service
    ) :JsonResponse {
        try {
            $saved = $service->setProperties($request->all())->save();

            if(!$saved) {
                throw new \Exception('Could not save Project');
            }

            $response = $this->success(
                'Project Saved',
                200,
                [
                    'project'=>$service->getEntity(false)
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Error creating project.',
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
     * @param ProjectUpdateRequest $request
     * @param ProjectSaveService $service
     * @return JsonResponse
     */
    public function update(
        ProjectUpdateRequest $request,
        ProjectSaveService   $service
    ) :JsonResponse {
        try {
            $saved = $service
                ->setIdentity($request->route()->parameter('id'))
                ->setProperties($request->all())->save();

            if(!$saved) {
                throw new \Exception('Could not update Project');
            }

            $response = $this->success(
                'Project Updated',
                200,
                [
                    'project'=>$service->getEntity(false)
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Error updating project.',
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
     * @param ProjectDeleteRequest $request
     * @param ProjectDeleteService $service
     * @return JsonResponse
     */
    public function delete(
        ProjectDeleteRequest $request,
        ProjectDeleteService $service
    ) :JsonResponse
    {
        $response = null;
        try {
            $deleted = $service->setIdentity($request->route()->parameter('id'))->delete();

            if(!$deleted){
                throw new \Exception('Could not delete record');
            }

            $response = $this->success('Project deleted',200,['message'=>'deleted','project'=>$request->all()]);
        } catch (\Throwable $throwable) {
            $response = $this->failure('Content delete failed',422,['message'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }

    /**
     * @param ProjectDeleteRequest $request
     * @param ProjectDeleteAllService $service
     * @return JsonResponse
     */
    public function deleteAll(
        ProjectDeleteRequest $request,
        ProjectDeleteAllService $service
    ) :JsonResponse
    {
        $response = null;

        try {
            $deleted = $service->truncate();

            if(!$deleted){
                throw new \Exception('Could not delete all Project');
            }
            $response = $this->success(
              'Project deleted',
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
     * @param ProjectSearchRequest $request
     * @param ProjectSearchService $service
     * @return JsonResponse
     */
    public function search(
        ProjectSearchRequest $request,
        ProjectSearchService $service
    ) :JsonResponse
    {
        $response = null;

        try {
            $term = $request->route()->parameter('term');
            $content = $service->setTerm($term)->search();

            $response = $this->success(
                $project->count().' Project found',
                200,
                [
                    'project' =>  $project
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure('Search failed',422,['message'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }
}

