<?php

use App\Http\Controllers\api\RootsIndexController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/roots', RootsIndexController::class);
