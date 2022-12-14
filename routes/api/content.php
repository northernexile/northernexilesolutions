<?php

use App\Http\Controllers\ContentController;
use Illuminate\Support\Facades\Route;

Route::prefix('content')->group(function (){
    Route::get('/',[ContentController::class,'index'])->name('content.index');
    Route::get('/{id}',[ContentController::class,'show'])->name('content.show');
    Route::put('/{id}',[ContentController::class,'update'])->name('content.save');
    Route::post('/{id}',[ContentController::class,'create'])->name('content.save');
    Route::delete('/{id}',[ContentController::class,'delete'])->name('content.delete');
    Route::get('/search/{term}',[ContentController::class,'search'])->name('content.search');
});
