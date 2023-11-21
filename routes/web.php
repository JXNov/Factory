<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SiteController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ExampleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::prefix('admin')->group(function () {

    Route::prefix('subject')->group(function () {
        Route::get('/', [SubjectController::class, 'index']);

        Route::get('/create', [SubjectController::class, 'create']);

        Route::post('/store', [SubjectController::class, 'store']);

        Route::get('/edit/{id}', [SubjectController::class, 'edit']);

        Route::put('/update/{id}', [SubjectController::class, 'update']);

        Route::delete('/destroy/{id}', [SubjectController::class, 'destroy']);
    });

    Route::prefix('example')->group(function () {
        Route::get('/', [ExampleController::class, 'index']);

        Route::get('/create', [ExampleController::class, 'create']);

        Route::post('/store', [ExampleController::class, 'store']);

        Route::get('/edit/{id}', [ExampleController::class, 'edit']);

        Route::put('/update/{id}', [ExampleController::class, 'update']);

        Route::delete('/destroy/{id}', [ExampleController::class, 'destroy']);
    });
});

Route::get('/', [SiteController::class, 'index']);
