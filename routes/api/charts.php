<?php

use App\Http\Controllers\ChartController;
use Illuminate\Support\Facades\Route;

Route::prefix('chart')->group(function (){
    Route::get('frameworks',[ChartController::class,'frameworks'])
        ->name('api.chart.frameworks');
});
