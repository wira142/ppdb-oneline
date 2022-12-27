<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SchoolController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
Auth::routes();

Route::get('/', function () {
    return view('index', ['page' => 'home']);
})->name('home');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/schools')->group(function () {
    Route::get('/', [SchoolController::class, 'index']);
    Route::get('/show', [SchoolController::class, 'show']);
});

Route::middleware('auth')->group(function () {
    Route::get('/registration', [ProfileController::class, 'regisForm'])->middleware('student');
    Route::get('/registration/update', [ProfileController::class, 'editForm'])->middleware('student');
    Route::post('/registration', [ProfileController::class, 'store'])->middleware('student')->name('registration');
    Route::put('/registration/update', [ProfileController::class, 'update'])->middleware('student')->name('update_registration_form');

    Route::prefix('/user')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('profile');
        Route::get('/profile/delete', [ProfileController::class, 'destroy']);
        Route::prefix('')->middleware('owner')->group(function () {
            Route::get('/school', [SchoolController::class, 'mySchool']);
            Route::prefix('/registrators')->group(function () {
                Route::get('/', [RegistrationController::class, 'registrators']);
                Route::get('/user_id', [RegistrationController::class, 'showStudent']);
                Route::get('/back', function () {
                    return redirect('/user/registrators');
                });
            });
        });
        Route::prefix('/submission')->middleware('student')->group(function () {
            Route::get('/', [RegistrationController::class, 'submission']);
            Route::get('/{registration}', [RegistrationController::class, 'detailSubmission']);
        });
    });
});
