<?php

use App\Http\Controllers\[ModuleSingular]Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('[ModuleSingularLowercase]')->group(function (){
Route::get('/',[[ModuleSingular]Controller::class,'index'])->name('[ModuleSingularLowercase].index');
Route::get('/{id}',[[ModuleSingular]Controller::class,'show'])->name('[ModuleSingularLowercase].show');
Route::put('/{id}',[[ModuleSingular]Controller::class,'update'])->name('[ModuleSingularLowercase].save');
Route::post('/{id}',[[ModuleSingular]Controller::class,'create'])->name('[ModuleSingularLowercase].save');
Route::delete('/',[[ModuleSingular]Controller::class,'deleteAll'])->name('[ModuleSingularLowercase].delete.all');
Route::delete('/{id}',[[ModuleSingular]Controller::class,'delete'])->name('[ModuleSingularLowercase].delete');
Route::get('/search/{term}',[[ModuleSingular]Controller::class,'search'])->name('[ModuleSingularLowercase].search');
});
