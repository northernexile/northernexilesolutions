<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClientInvoiceController;
use Illuminate\Support\Facades\Route;

$sectionName = 'client';

Route::prefix('client')->middleware(['auth:sanctum','owner'])->group(function ($request) use($sectionName){

    Route::prefix('invoices')->group(function ($request) use($sectionName){
        $sectionName.='.invoices';

        Route::get('/',[ClientInvoiceController::class,'index'])->name($sectionName.'.index');
        Route::get('/{id}',[ClientInvoiceController::class,'show'])->name($sectionName.'.show');
        Route::put('/{id}',[ClientInvoiceController::class,'update'])->name($sectionName.'.save');
        Route::post('/{id}',[ClientInvoiceController::class,'create'])->name($sectionName.'.save');
        Route::delete('/',[ClientInvoiceController::class,'deleteAll'])->name($sectionName.'.delete.all');
        Route::delete('/{id}',[ClientInvoiceController::class,'delete'])->name($sectionName.'.delete');
        Route::get('/search/{term}',[ClientInvoiceController::class,'search'])->name($sectionName.'.search');
    });

    Route::get('/',[ClientController::class,'index'])->name($sectionName.'.index');
    Route::get('/{id}',[ClientController::class,'show'])->name($sectionName.'.show');
    Route::patch('/{id}',[ClientController::class,'update'])->name($sectionName.'.save');
    Route::post('/',[ClientController::class,'create'])->name($sectionName.'.save');
    Route::delete('/',[ClientController::class,'deleteAll'])->name($sectionName.'.delete.all');
    Route::delete('/{id}',[ClientController::class,'delete'])->name($sectionName.'.delete');
    Route::get('/search/{term}',[ClientController::class,'search'])->name($sectionName.'.search');
});
