<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware('visitlog');



Route::fallback(function(){
    return redirect('admin');
});
