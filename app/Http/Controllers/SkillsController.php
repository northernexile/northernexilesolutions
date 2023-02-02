<?php

namespace App\Http\Controllers;

use App\Http\Requests\Technology\CreateTechnologyRequest;
use App\Http\Requests\Technology\DeleteTechnologyRequest;
use App\Http\Traits\JsonResponseTrait;
use App\Models\Skill;
use App\Services\Skills\SkillInUseService;
use App\Services\Skills\SkillsCreateService;
use App\Services\Skills\SkillsDeleteService;
use App\Services\Skills\SkillsListService;
use App\Services\Skills\SkillsSearchService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    use JsonResponseTrait;

    /**
     * @param SkillsListService $skillsListService
     * @return JsonResponse
     */
    public function index(SkillsListService $skillsListService) :JsonResponse
    {
        try {
            $response = $this->success('Skills list',200,['skills'=>$skillsListService->getList()]);
        } catch (\Throwable $throwable) {
            $response = $this->failure('Could not list skills',422,['message'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function show(Request $request) :JsonResponse
    {
        try {
            $skill = Skill::findOrFail($request->route()->parameter('id'));
            $skill->load('types');

            $response = $this->success('Skill found',200,['skill'=>$skill]);
        } catch (\Throwable $throwable) {
            $response = $this->failure('Could not find skill',422,['message'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }

    public function create(
        CreateTechnologyRequest $request,
        SkillsCreateService $service
    ) :JsonResponse
    {
        $response = null;
        try {
            $saved = $service->setProperties($request->all())->save();

            if(!$saved) {
                throw new \Exception('Could not save Technology');
            }

            $response = $this->success(
                'Technology Saved',
                200,
                [
                    'skill'=>$service->getEntity(false)
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure('Could not create skill',422,['message'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }

    /**
     * @param Request $request
     * @param SkillsSearchService $skillsSearchService
     * @return JsonResponse
     */
    public function search(
        Request $request,
        SkillsSearchService $skillsSearchService
    ) :JsonResponse
    {
        try {
            $skills = $skillsSearchService->setTerm($request->route()->parameter('term',''))->search();

            $response = $this->success('Search complete',200,['skills'=>$skills,'count'=>$skills->count()]);
        } catch (\Throwable $throwable) {
            $response = $this->failure('Search failed',422,['message'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }

    /**
     * @param DeleteTechnologyRequest $request
     * @param SkillInUseService $inUseService
     * @return JsonResponse
     */
    public function delete(
        DeleteTechnologyRequest $request,
        SkillInUseService $inUseService,
        SkillsDeleteService $deleteService
    ) :JsonResponse
    {
        $response = null;

        try {
            $idToDelete = $request->route()->parameter('id');

            if($inUseService->setId($idToDelete)->isInUse()){
                throw new \Exception('Skill is in use');
            }

            $deleted = $deleteService->setIdentity($idToDelete)->delete();

            $response = $this->success(
                'Skill '.$idToDelete.' deleted',
                200,
                [
                    'skill'=>$deleted
                ]
            );

        } catch (\Throwable $throwable) {
            $response = $this->failure(
              'Delete skill',
              433,
              [
                  'message'=>$throwable->getMessage()
              ]
            );
        } finally {
            return $response;
        }
    }
}
