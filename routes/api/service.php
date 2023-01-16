<?php

use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::prefix('service')->group(function (){
Route::get('/',[ServiceController::class,'index'])->name('service.index');
Route::get('/{id}',[ServiceController::class,'show'])->name('service.show');
Route::put('/{id}',[ServiceController::class,'update'])->name('service.save');
Route::post('/{id}',[ServiceController::class,'create'])->name('service.save');
Route::delete('/',[ServiceController::class,'deleteAll'])->name('service.delete.all');
Route::delete('/{id}',[ServiceController::class,'delete'])->name('service.delete');
Route::get('/search/{term}',[ServiceController::class,'search'])->name('service.search');
});
