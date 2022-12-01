<?php

namespace App\Http\Controllers;

use App\Http\Traits\JsonResponseTrait;
use App\Services\Skills\SkillsListService;
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
}
