<?php

namespace App\Http\Controllers;

use App\Http\Traits\JsonResponseTrait;
use App\Models\Skill;
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
            $skills = $skillsSearchService->setTerm($request->get('term'))->search();

            $response =$this->success('Search complete',200,['skills'=>$skills,'count'=>$skills->count()]);
        } catch (\Throwable $throwable) {
            $response = $this->failure('Search failed',422,['message'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }
}
