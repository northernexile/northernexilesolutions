<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::prefix('pages')->group(function ($request){
    Route::get('/search/{term}',[PageController::class,'search'])->name('pages.search');
    Route::get('/',[PageController::class,'index'])->name('pages.index');
    Route::get('{id}',[PageController::class,'view'])->name('pages.show');
    Route::post('/{id}',[PageController::class,'edit'])->name('pages.save');
    Route::delete('/{id}',[PageController::class,'delete'])->name('pages.delete');
});
