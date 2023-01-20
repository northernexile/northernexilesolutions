<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagCloudController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('profile')->group(function () {
    Route::get('/', [ProfileController::class,'index']);
});

Route::prefix('cloud')->group(function (){
   Route::get('/',[TagCloudController::class,'index']);
});

include 'api/auth.php';
include 'api/pages.php';
include 'api/skills.php';
include 'api/content.php';
include 'api/companyInformation.php';
include 'api/sectors.php';
include 'api/service.php';
