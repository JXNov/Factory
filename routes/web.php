<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\CheckRole;

use App\Http\Controllers\RegisterController;

use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\ExamsController as AdminExamsController;
use App\Http\Controllers\Admin\SubjectsController as AdminSubjectsController;
use App\Http\Controllers\Admin\QuestionsController as AdminQuestionsController;
use App\Http\Controllers\Admin\UsersController as AdminUsersController;

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

    Route::get('/', [AdminHomeController::class, 'index'])->name('admin.home');

    Route::get('/search', [AdminHomeController::class, 'search'])->name('admin.search');

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

    Route::group(['prefix' => 'questions'], function () {
        Route::get('/', [AdminQuestionsController::class, 'index'])->name('admin.questions');

        Route::get('/create', [AdminQuestionsController::class, 'create'])->name('admin.questions.create');

        Route::get('/createByExam/{id}', [AdminQuestionsController::class, 'createByExam'])->name('admin.questions.createByExam');

        Route::post('/', [AdminQuestionsController::class, 'store'])->name('admin.questions.store');

        Route::post('/createByExam/{id}', [AdminQuestionsController::class, 'storeByExam'])->name('admin.questions.storeByExam');

        Route::get('/{id}', [AdminQuestionsController::class, 'show'])->name('admin.questions.show');

        Route::get('/{id}/edit', [AdminQuestionsController::class, 'edit'])->name('admin.questions.edit');

        Route::put('/{id}', [AdminQuestionsController::class, 'update'])->name('admin.questions.update');

        Route::delete('/{id}', [AdminQuestionsController::class, 'destroy'])->name('admin.questions.destroy');
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [AdminUsersController::class, 'index'])->name('admin.users');

        Route::get('/create', [AdminUsersController::class, 'create'])->name('admin.users.create');

        Route::post('/', [AdminUsersController::class, 'store'])->name('admin.users.store');

        Route::get('/{id}', [AdminUsersController::class, 'show'])->name('admin.users.show');

        Route::get('/{id}/edit', [AdminUsersController::class, 'edit'])->name('admin.users.edit');

        Route::put('/{id}', [AdminUsersController::class, 'update'])->name('admin.users.update');

        Route::delete('/{id}', [AdminUsersController::class, 'destroy'])->name('admin.users.destroy');
    });
});

Route::get('/', [ClientHomeController::class, 'index'])->name('/');

Route::get('/register', [RegisterController::class, 'index'])->name('register');

Route::fallback(function () {
    $response = response()->view('errors.404', [], 404);
    return $response;
});
