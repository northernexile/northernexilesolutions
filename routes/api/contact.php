<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

$sectionName = 'contact';

Route::prefix('contact')->group(function ($request) use($sectionName){
Route::get('/',[ContactController::class,'index'])->name($sectionName.'.index');
Route::get('/{id}',[ContactController::class,'show'])->name($sectionName.'.show');
Route::put('/{id}',[ContactController::class,'update'])->name($sectionName.'.save');
Route::post('/',[ContactController::class,'create'])->name($sectionName.'.save');
Route::delete('/',[ContactController::class,'deleteAll'])->name($sectionName.'.delete.all');
Route::delete('/{id}',[ContactController::class,'delete'])->name($sectionName.'.delete');
Route::get('/search/{term}',[ContactController::class,'search'])->name($sectionName.'.search');
});
