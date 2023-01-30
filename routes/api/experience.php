<?php

use App\Http\Controllers\ExperienceController;
use Illuminate\Support\Facades\Route;

$sectionName = 'experience';

Route::prefix('experience')->group(function ($request) use($sectionName){
Route::get('/',[ExperienceController::class,'index'])->name($sectionName.'.index');
Route::get('/{id}',[ExperienceController::class,'show'])->name($sectionName.'.show');
Route::put('/{id}',[ExperienceController::class,'update'])->name($sectionName.'.save');
Route::post('/{id}',[ExperienceController::class,'create'])->name($sectionName.'.save');
Route::delete('/',[ExperienceController::class,'deleteAll'])->name($sectionName.'.delete.all');
Route::delete('/{id}',[ExperienceController::class,'delete'])->name($sectionName.'.delete');
Route::get('/search/{term}',[ExperienceController::class,'search'])->name($sectionName.'.search');
});
