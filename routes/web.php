<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return "Hello World";
}); //simple route

Route::get('/about/{name}', function ($name) {
    return "Hello ". $name;
}); //passing parameter

Route::get('/greeting', function () {
    return "Greetings";
})->name('greeting'); //set name for function

Route::get('/hello', function () {
    return redirect()->route('/greeting');
}); //redirect to greeting

Route::get('/home', function () {
    return view('Welcome');
}); //return view
