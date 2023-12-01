<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\CheckRole;

use App\Http\Controllers\RegisterController;

use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\ExamsController as AdminExamsController;
use App\Http\Controllers\Admin\SubjectsController as AdminSubjectsController;

use App\Http\Controllers\Client\HomeController as ClientHomeController;


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
    Route::group(['prefix' => 'exams'], function () {
        Route::get('/', [AdminExamsController::class, 'index'])->name('admin.exams');


        Route::get('/create', [AdminExamsController::class, 'create'])->name('admin.exams.create');

        Route::post('/', [AdminExamsController::class, 'store'])->name('admin.exams.store');

        Route::get('/{id}', [AdminExamsController::class, 'show'])->name('admin.exams.show');

        Route::get('/{id}/edit', [AdminExamsController::class, 'edit'])->name('admin.exams.edit');

        Route::put('/{id}', [AdminExamsController::class, 'update'])->name('admin.exams.update');

        Route::delete('/{id}', [AdminExamsController::class, 'destroy'])->name('admin.exams.destroy');
    });

    Route::group(['prefix' => 'subjects'], function () {
        Route::get('/', [AdminSubjectsController::class, 'index'])->name('admin.subjects');

        Route::get('/create', [AdminSubjectsController::class, 'create'])->name('admin.subjects.create');

        Route::post('/', [AdminSubjectsController::class, 'store'])->name('admin.subjects.store');

        Route::get('/{id}', [AdminSubjectsController::class, 'show'])->name('admin.subjects.show');

        Route::get('/{id}/edit', [AdminSubjectsController::class, 'edit'])->name('admin.subjects.edit');

        Route::put('/{id}', [AdminSubjectsController::class, 'update'])->name('admin.subjects.update');

        Route::delete('/{id}', [AdminSubjectsController::class, 'destroy'])->name('admin.subjects.destroy');
    });

    Route::get('/search', [AdminHomeController::class, 'search'])->name('admin.search');

    Route::get('/', [AdminHomeController::class, 'index'])->name('admin.home');
});

Route::get('/register', [RegisterController::class, 'index'])->name('register');

Route::get('/', [ClientHomeController::class, 'index'])->name('/');

Route::fallback(function () {
    $response = response()->view('errors.404', [], 404);
    return $response;
});
