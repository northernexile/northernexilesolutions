<?php

use App\Http\Controllers\ClientAddressController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClientInvoiceController;
use App\Http\Controllers\ClientInvoiceItemController;
use Illuminate\Support\Facades\Route;

$sectionName = 'client';

Route::prefix('client')->middleware(['auth:sanctum','owner'])->group(function ($request) use($sectionName){

    Route::prefix('addresses')->group(function ($request) use($sectionName){
        $sectionName.='.addresses';
        Route::get('/',[ClientAddressController::class,'index'])->name($sectionName.'.index');
        Route::get('/{id}',[ClientAddressController::class,'show'])->name($sectionName.'.show');
        Route::patch('/{id}',[ClientAddressController::class,'update'])->name($sectionName.'.save');
        Route::post('/',[ClientAddressController::class,'create'])->name($sectionName.'.save');
        Route::delete('/',[ClientAddressController::class,'deleteAll'])->name($sectionName.'.delete.all');
        Route::delete('/{id}',[ClientAddressController::class,'delete'])->name($sectionName.'.delete');
        Route::get('/search/{term}',[ClientAddressController::class,'search'])->name($sectionName.'.search');
    });

    Route::prefix('invoices')->group(function ($request) use($sectionName){
        $sectionName.='.invoices';

        Route::prefix('item')->group(function ($request) use($sectionName){
            $sectionName.='.items';

            Route::get('/',[ClientInvoiceItemController::class,'index'])->name($sectionName.'.index');
            Route::get('/{id}',[ClientInvoiceItemController::class,'show'])->name($sectionName.'.show');
            Route::patch('/{id}',[ClientInvoiceItemController::class,'update'])->name($sectionName.'.save');
            Route::post('/',[ClientInvoiceItemController::class,'create'])->name($sectionName.'.save');
            Route::delete('/',[ClientInvoiceItemController::class,'deleteAll'])->name($sectionName.'.delete.all');
            Route::delete('/{id}',[ClientInvoiceItemController::class,'delete'])->name($sectionName.'.delete');
            Route::get('/search/{term}',[ClientInvoiceItemController::class,'search'])->name($sectionName.'.search');
        });

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
