<?php

namespace App\Http\Controllers;

use App\Http\Requests\Experience\ExperienceDeleteRequest;
use App\Http\Requests\Experience\ExperienceListRequest;
use App\Http\Requests\Experience\ExperienceCreateRequest;
use App\Http\Requests\Experience\ExperienceSearchRequest;
use App\Http\Requests\Experience\ExperienceUpdateRequest;
use App\Http\Requests\Experience\ExperienceViewRequest;
use App\Http\Traits\JsonResponseTrait;
use App\Services\Experience\ExperienceDeleteAllService;
use App\Services\Experience\ExperienceDeleteService;
use App\Services\Experience\ExperienceListService;
use App\Services\Experience\ExperienceSaveService;
use App\Services\Experience\ExperienceSearchService;
use App\Services\Experience\ExperienceViewService;
use Illuminate\Http\JsonResponse;

class ExperienceController extends Controller
{
    use JsonResponseTrait;

        /**
     * @param ExperienceListRequest $request
     * @param ExperienceListService $service
     * @return JsonResponse
     */
    public function index(
        ExperienceListRequest $request,
        ExperienceListService $service
    ) :JsonResponse
    {
        $response =null;

        try {
            $response = $this->success(
                'Listing Experiences',
                200,
                [
                    'Experiences'=>$service->getList(),
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Could not list Experience',
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
     * @param ExperienceViewRequest $request
     * @param ExperienceViewService $service
     * @return JsonResponse
     */
    public function show(
        ExperienceViewRequest $request,
        ExperienceViewService $service
    ) :JsonResponse
    {
        $response =null;

        try {
            $experience = $service->setIdentity($request->route()->parameter('id'))->get();

            $response = $this->success('Experience found',200,['Experience'=>$experience]);
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Could not list experience',
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
     * @param ExperienceCreateRequest $request
     * @param ExperienceSaveService $service
     * @return JsonResponse
     */
    public function create(
        ExperienceCreateRequest $request,
        ExperienceSaveService   $service
    ) :JsonResponse {
        try {
            $saved = $service->setProperties($request->all())->save();

            if(!$saved) {
                throw new \Exception('Could not save Experience');
            }

            $response = $this->success(
                'Experience Saved',
                200,
                [
                    'experience'=>$service->getEntity(false)
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Error creating experience.',
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
     * @param ExperienceUpdateRequest $request
     * @param ExperienceSaveService $service
     * @return JsonResponse
     */
    public function update(
        ExperienceUpdateRequest $request,
        ExperienceSaveService   $service
    ) :JsonResponse {
        try {
            $saved = $service
                ->setIdentity($request->route()->parameter('id'))
                ->setProperties($request->all())->save();

            if(!$saved) {
                throw new \Exception('Could not update Experience');
            }

            $response = $this->success(
                'Experience Updated',
                200,
                [
                    'experience'=>$service->getEntity(false)
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Error updating experience.',
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
     * @param ExperienceDeleteRequest $request
     * @param ExperienceDeleteService $service
     * @return JsonResponse
     */
    public function delete(
        ExperienceDeleteRequest $request,
        ExperienceDeleteService $service
    ) :JsonResponse
    {
        $response = null;
        try {
            $deleted = $service->setIdentity($request->route()->parameter('id'))->delete();

            if(!$deleted){
                throw new \Exception('Could not delete record');
            }

            $response = $this->success('Experience deleted',200,['message'=>'deleted','experience'=>$request->all()]);
        } catch (\Throwable $throwable) {
            $response = $this->failure('Content delete failed',422,['message'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }

    /**
     * @param ExperienceDeleteRequest $request
     * @param ExperienceDeleteAllService $service
     * @return JsonResponse
     */
    public function deleteAll(
        ExperienceDeleteRequest $request,
        ExperienceDeleteAllService $service
    ) :JsonResponse
    {
        $response = null;

        try {
            $deleted = $service->truncate();

            if(!$deleted){
                throw new \Exception('Could not delete all Experience');
            }
            $response = $this->success(
              'Experience deleted',
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
     * @param ExperienceSearchRequest $request
     * @param ExperienceSearchService $service
     * @return JsonResponse
     */
    public function search(
        ExperienceSearchRequest $request,
        ExperienceSearchService $service
    ) :JsonResponse
    {
        $response = null;

        try {
            $term = $request->route()->parameter('term');
            $content = $service->setTerm($term)->search();

            $response = $this->success(
                $experience->count().' Experience found',
                200,
                [
                    'experience' =>  $experience
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure('Search failed',422,['message'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }
}

