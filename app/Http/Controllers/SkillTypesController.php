<?php

namespace App\Http\Controllers;

use App\Http\Traits\JsonResponseTrait;
use App\Models\SkillType;
use App\Services\Formatting\SnakeToCamelFormatter;
use App\Services\Skills\Types\SkillTypesListService;
use App\Services\Skills\Types\SkillTypesSearchService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SkillTypesController extends Controller
{
    use JsonResponseTrait;

    private Request $request;

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param SkillTypesListService $skillTypesListService
     * @return JsonResponse
     */
    public function index(SkillTypesListService $skillTypesListService) :JsonResponse
    {
        try {
            $response = $this->success(
                'Skill types found.',
                200,
                [
                    'skillTypes'=>$skillTypesListService->getList()
                ]
            );

        } catch (\Throwable $throwable) {
            $response = $this->failure('Skill types not found',422,['message'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }

    /**
     * @return JsonResponse
     */
    public function show() :JsonResponse
    {
        try {
            $skillType = SkillType::findOrFail($this->request->route()->parameter('id'));

            $response = $this->success('Skill type found',200,['skillType'=>$skillType]);
        } catch (\Throwable $throwable) {
            $response = $this->failure('Skill type not found',422,['message'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }

    /**
     * @param SkillTypesSearchService $skillTypesSearchService
     * @return JsonResponse
     */
    public function search(SkillTypesSearchService $skillTypesSearchService) :JsonResponse
    {
        try {
            $skillTypes = $skillTypesSearchService
                ->setTerm($this->request->route()->parameter('term'))
                ->search();

            $response = $this->success('Skill types found',200,['skillTypes'=>$skillTypes,'count'=>$skillTypes->count()]);
        } catch (\Throwable $throwable) {
            $response = $this->failure('Skill types not found',422,['message'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }
}
