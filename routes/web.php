<?php

use Illuminate\Support\Facades\Route;

Route::view('/index', 'index');

Route::view('/appointment', 'appointment');

Route::View('/services', 'services');

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});
