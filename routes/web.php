<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('home'));
Route::get('/ticket', fn () => view('ticket'));
Route::get('/review', fn () => view('review'));
Route::get('/workplan', fn () => view('workplan'));
Route::get('/realization', fn () => view('realization'));

