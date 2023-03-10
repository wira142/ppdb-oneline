<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\RegistrationFormController;
use App\Http\Controllers\SchoolController;
use App\Models\RegistrationForm;
use App\Models\School;
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

Route::get('/', [HomeController::class, 'index']);
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/schools')->group(function () {
    Route::get('/', [SchoolController::class, 'index']);
    Route::get('/show/{id}', [SchoolController::class, 'show']);
    Route::get('/show/registration/{form}', [RegistrationFormController::class, 'detail']);
    Route::get('/find', [SchoolController::class, 'findSchool'])->name('find-school');
});

Route::middleware('auth')->group(function () {
    Route::get('/registration/edit', [ProfileController::class, 'editForm'])->middleware('student')->name('edit-personal-data');
    Route::get('/registration/{form}', [ProfileController::class, 'regisForm'])->middleware('student');

    Route::post('/registration', [ProfileController::class, 'store'])->middleware('student')->name('registration'); //insert personal data
    Route::put('/registration/update', [ProfileController::class, 'update'])->middleware('student')->name('update_registration_form'); //update personal data

    Route::get('/school/{form}/registration', [RegistrationController::class, 'storeRegistration'])->name('store-registration')->middleware('student');

    Route::prefix('/user')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('profile');
        Route::get('/edit', [ProfileController::class, 'editProfile']);
        Route::put('/edit', [ProfileController::class, 'updateProfile'])->name('update-profile');
        Route::get('/profile/delete', [ProfileController::class, 'destroy']);
        Route::prefix('/submission')->middleware('student')->group(function () {
            Route::get('/', [RegistrationController::class, 'submission']);
            Route::get('/{registration}/accept', [RegistrationController::class, 'acceptRegistration'])->name('acc-submission');
            Route::get('/{registration}/reject', [RegistrationController::class, 'rejectRegistration'])->name('reject-submission');
            Route::get('/{registration}', [RegistrationController::class, 'detailSubmission']);
        });
        Route::middleware('owner')->group(function () {

            Route::get('/school', [SchoolController::class, 'mySchool']);
            Route::get('/school/edit', [SchoolController::class, 'editSchool']);
            Route::post('/school', [SchoolController::class, 'store'])->name('store-school');
            Route::put('/school', [SchoolController::class, 'update'])->name('update-school');
            Route::get('/school/delete', [SchoolController::class, 'destroy'])->name('delete-school');

            Route::prefix('/registrators')->group(function () {
                Route::get('/', [RegistrationController::class, 'registrators']);
                Route::get('/back', function () {
                    return redirect('/user/registrators');
                });
                Route::get('/student/{registration}/qualify', [RegistrationController::class, 'qualifyRegistrators'])->name('registrator-qualify');
                Route::get('/student/{registration}/reject', [RegistrationController::class, 'rejectRegistrators'])->name('registrator-reject');
                Route::get('/{user}/{registration_id}', [RegistrationController::class, 'showStudent']);
            });
            Route::prefix('/forms')->group(function () {
                Route::get('/', [RegistrationFormController::class, 'index']);
                Route::get('/new-poster', [RegistrationFormController::class, 'newPoster']);
                Route::post('/new-poster', [RegistrationFormController::class, 'storePoster'])->name('store-new-poster');
                Route::put('/update-poster/{form}', [RegistrationFormController::class, 'updatePoster'])->name('update-poster');
                Route::get('/show/{form}', [RegistrationFormController::class, 'show']);
            });
        });
    });
});
