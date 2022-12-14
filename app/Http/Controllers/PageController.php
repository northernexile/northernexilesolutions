<?php

namespace App\Http\Controllers;

use App\Http\Requests\Page\PageDeleteRequest;
use App\Http\Requests\Page\PageListRequest;
use App\Http\Requests\Page\PageSaveRequest;
use App\Http\Requests\Page\PageSearchRequest;
use App\Http\Requests\Page\PageViewRequest;
use App\Http\Traits\JsonResponseTrait;
use App\Services\Page\PageDeleteService;
use App\Services\Page\PageSaveService;
use App\Services\Page\PageListService;
use App\Services\Page\PageSearchService;
use App\Services\Page\PageViewService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PageController extends Controller
{
    use JsonResponseTrait;

    /**
     * @param PageListRequest $request
     * @param PageListService $pageListService
     * @return JsonResponse
     */
    public function index(
        PageListRequest $request,
        PageListService $pageListService
    ): JsonResponse
    {
        $response = null;

        try {
            $response = $this->success(
                'Listing pages',
                200,
                [
                    'pages'=>$pageListService->getList(),
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure('Could not list pages.',422,['message'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }

    /**
     * @param Request $request
     * @param PageViewService $service
     * @return JsonResponse
     */
    public function view(
        Request $request,
        PageViewService $service
    ): JsonResponse
    {
        $response = null;

        try {

            $page = $service->setIdentity($request->route()->parameter('id'))->get();

            $response = $this->success(
                'Page found',
                200,
                [
                    'page'=> $page,
                ]
            );
        } catch (\Throwable $throwable) {
            echo $throwable->getMessage();
            $response = $this->failure('Could not list pages.',422,['message'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }

    /**
     * @param PageDeleteRequest $request
     * @param PageDeleteService $pageDeleteService
     * @return JsonResponse
     */
    public function delete(
        PageDeleteRequest $request,
        PageDeleteService $pageDeleteService
    ): JsonResponse
    {
        $response = null;

        try {
            $id = $request->route()->parameter('id');
            $deleted = $pageDeleteService
                ->setIdentity($id)
                ->delete();

            if(!$deleted){
                throw new \Exception('Could not delete page id: '.$id);
            }

            $this->success('Page \'$id\' deleted');
        } catch (\Throwable $throwable) {
            $response = $this->failure('Error deleting page.',422,['message'=>$throwable->getMessage()]);
        } finally {
            return $response;
        }
    }

    /**
     * @param PageSaveRequest $request
     * @param PageSaveService $service
     * @return JsonResponse
     */
    public function edit(
        PageSaveRequest $request,
        PageSaveService $service
        ): JsonResponse
    {
        $response = null;
        try {
            $saved = $service
                ->setIdentity($request->route()->parameter('id'))
                ->setProperties($request->only(['name','slug']))
                ->save();

            if(!$saved) {
                throw new \Exception('Could not save page');
            }

            $response = $this->success(
              'Page Saved',
              200,
              [
                  'page'=>$service->getEntity(false)
              ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Error editing page.',
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
     * @param PageSearchRequest $request
     * @param PageSearchService $service
     * @return JsonResponse
     */
    public function search(
        PageSearchRequest $request,
        PageSearchService $service
    ): JsonResponse
    {
        $response = null;
        try {
            $term = $request->route()->parameter('term');
            $pages = $service->setTerm($term)->search();

            $response = $this->success(
                $pages->count().' Page(s) found',
                200,
                [
                    'pages' =>  $pages
                ]
            );
        } catch (\Throwable $throwable) {
            $response = $this->failure(
                'Search failed',
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
}
