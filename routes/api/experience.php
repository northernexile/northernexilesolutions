<?php

use App\Http\Controllers\ExperienceController;
use Illuminate\Support\Facades\Route;

$sectionName = 'experience';

Route::prefix('experience')->group(function ($request) use($sectionName){
Route::get('/',[ExperienceController::class,'index'])
    ->name($sectionName.'.index')->middleware(['auth:sanctum','owner']);
Route::get('/{id}',[ExperienceController::class,'show'])
    ->name($sectionName.'.show')
    ->middleware(['auth:sanctum','owner']);
Route::patch('/{id}',[ExperienceController::class,'update'])
    ->middleware(['auth:sanctum','owner'])
    ->name($sectionName.'.save');
Route::post('/',[ExperienceController::class,'create'])
    ->middleware(['auth:sanctum','owner'])
    ->name($sectionName.'.save');
Route::delete('/',[ExperienceController::class,'deleteAll'])
    ->middleware(['auth:sanctum','owner'])
    ->name($sectionName.'.delete.all');
Route::delete('/{id}',[ExperienceController::class,'delete'])
    ->middleware(['auth:sanctum','owner'])
    ->name($sectionName.'.delete');
Route::get('/search/{term}',[ExperienceController::class,'search'])
    ->middleware(['auth:sanctum','owner'])
    ->name($sectionName.'.search');
});
