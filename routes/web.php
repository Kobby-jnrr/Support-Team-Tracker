<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;

Route::get('/', function () {
    return redirect('/activities');
});

Route::get('/activities', [ActivityController::class, 'index']);

Route::get('/activities/create', [ActivityController::class, 'create']);

Route::post('/activities', [ActivityController::class, 'store']);