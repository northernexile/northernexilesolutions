<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SkillsController;
use App\Http\Controllers\SkillTypesController;
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

Route::prefix('skills')->group(function (){
    Route::get('',[SkillsController::class,'index'])->name('skill.index');
    Route::get('{id}',[SkillsController::class,'show'])->name('skill.show');
    Route::get('/search/{term}',[SkillsController::class,'search'])->name('skill.search');

    Route::prefix('types')->group(function () {
       Route::get('',[SkillTypesController::class,'index'])->name('skill.type.index');
       Route::get('{id}',[SkillTypesController::class,'show'])->name('skill.type.show');
       Route::get('/search/{term}',[SkillTypesController::class,'search'])->name('skill.type.search');
    });
});
