<?php

use App\Http\Controllers\Api\RootsIndexController;
use App\Http\Controllers\Api\VerseSearchController;
use App\Http\Controllers\Api\WordsSearchController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/roots', RootsIndexController::class);
Route::get('/words', WordsSearchController::class);
Route::get('/verses', VerseSearchController::class);
