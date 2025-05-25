<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/upload-file', function () {
    return view('upload_file');
})->name('upload-file');

Route::get('/edit-profile', function () {
    return view('edit_profile'); 
})->name('edit_profile'); 