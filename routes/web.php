<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ActivityController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect('/register');
});

Route::get('/dashboard', function () {

    $totalActivities = \App\Models\Activity::count();

    $totalUpdates = \App\Models\ActivityUpdate::count();

    $doneUpdates = \App\Models\ActivityUpdate::where('status', 'done')->count();

    $pendingUpdates = \App\Models\ActivityUpdate::where('status', '!=', 'done')->count();

    return view('dashboard', compact(
        'totalActivities',
        'totalUpdates',
        'doneUpdates',
        'pendingUpdates'
    ));

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/activities', [ActivityController::class, 'index']);

    Route::get('/activities/create', [ActivityController::class, 'create']);

    Route::post('/activities', [ActivityController::class, 'store']);

    Route::get('/activities/{id}/update', [ActivityController::class, 'addUpdate']);

    Route::post('/activities/{id}/update', [ActivityController::class, 'saveUpdate']);

    Route::get('/activities/today', [ActivityController::class, 'todayLog']);

    Route::get('/activities/report', [ActivityController::class, 'report']);
});



require __DIR__.'/auth.php';