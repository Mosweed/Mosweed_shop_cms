<?php

use Illuminate\Support\Facades\Route;

Route::get('/401', function () {
    return view('/errors/401');
})->name('401');

Route::get('/403', function () {
    return view('/errors/403');
})->name('403');

Route::get('/404', function () {
    return view('/errors/404');
})->name('404');

Route::get('/400', function () {
    return view('/errors/400');
})->name('400');
Route::get('/429', function () {
    return view('/errors/429');
})->name('429');

Route::get('/500', function () {
    return view('/errors/500');
})->name('500');

Route::get('/503', function () {
    return view('/errors/503');
})->name('503');
