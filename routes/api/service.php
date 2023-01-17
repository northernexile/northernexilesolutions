<?php

use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

$sectionName = 'service';

Route::prefix($sectionName)->group(function ($request) use($sectionName) {
Route::get('/',[ServiceController::class,'index'])->name($sectionName.'.index');
Route::get('/{id}',[ServiceController::class,'show'])->name($sectionName.'.show');
Route::put('/{id}',[ServiceController::class,'update'])->name($sectionName.'.save');
Route::post('/{id}',[ServiceController::class,'create'])->name($sectionName.'.save');
Route::delete('/',[ServiceController::class,'deleteAll'])->name($sectionName.'.delete.all');
Route::delete('/{id}',[ServiceController::class,'delete'])->name($sectionName.'.delete');
Route::get('/search/{term}',[ServiceController::class,'search'])->name($sectionName.'.search');
});
