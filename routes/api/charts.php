<?php

use App\Http\Controllers\ChartController;
use Illuminate\Support\Facades\Route;

Route::prefix('chart')->group(function (){
    Route::get('all',[ChartController::class,'charts'])
        ->name('api.char.all');
    Route::get('frameworks',[ChartController::class,'frameworks'])
        ->name('api.chart.frameworks');
    Route::get('sectors',[ChartController::class,'sectors'])
        ->name('api.chart.sectors');
});
