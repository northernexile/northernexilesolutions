<?php

use App\Http\Controllers\[ModuleSingular]Controller;
use Illuminate\Support\Facades\Route;

$sectionName = '[ModuleSingularLowercase]';

Route::prefix('[ModuleSingularLowercase]')->group(function ($request) use($sectionName){
Route::get('/',[[ModuleSingular]Controller::class,'index'])->name($sectionName.'.index');
Route::get('/{id}',[[ModuleSingular]Controller::class,'show'])->name($sectionName.'.show');
Route::patch('/{id}',[[ModuleSingular]Controller::class,'update'])->name($sectionName.'.save');
Route::post('/',[[ModuleSingular]Controller::class,'create'])->name($sectionName.'.save');
Route::delete('/',[[ModuleSingular]Controller::class,'deleteAll'])->name($sectionName.'.delete.all');
Route::delete('/{id}',[[ModuleSingular]Controller::class,'delete'])->name($sectionName.'.delete');
Route::get('/search/{term}',[[ModuleSingular]Controller::class,'search'])->name($sectionName.'.search');
});
