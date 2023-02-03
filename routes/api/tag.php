<?php

use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::prefix('tag')->group(function (){
    Route::get('/',[TagController::class,'index'])->name('tag.index');
    Route::get('/{id}',[TagController::class,'show'])->name('tag.show');
    Route::patch('/{id}',[TagController::class,'update'])->name('tag.update');
    Route::post('/',[TagController::class,'create'])->name('tag.create');
    Route::delete('/',[TagController::class,'deleteAll'])->name('tag.delete.all');
    Route::delete('/{id}',[TagController::class,'delete'])->name('tag.delete');
    Route::get('/search/{term}',[TagController::class,'search'])->name('tag.search');
});
