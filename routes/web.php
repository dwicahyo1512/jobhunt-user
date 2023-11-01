<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\loginCheck;

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

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
    Route::post('/register', [AuthController::class, 'register'])->name('v_register');
    Route::get('/register-company', function () {
        return view('registercompany');
    })->name('registercompany');
    Route::get('/register', function () {
        return view('register');
    })->name('register');
    Route::get('/login/forgotpassword', function () {
        return view('forgotpass');
    });
});

Route::post('/jobs', [JobController::class, 'index']);
Route::post('/jobs_detail', [JobController::class, 'detail_job']);

Route::get('/jobscount', [JobController::class, 'jobscount']);


Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('/category', function () {
    return view('category');
})->name('category');

Route::get('/register-company', function () {
    return view('registercompany');
})->name('registercompany');

Route::get('/detailjob', function () {
    return view('detailjob');
});

Route::post('/register/company', [CompanyController::class, 'store'])->name('register.company');

Route::get('/registerchoice', function () {
    return view('registerchoice');
});

Route::get('/landing', function () {
    return view('landingadmin');
});


Route::middleware([loginCheck::class])->group(function () {
    Route::get('/resumeprev', [ResumeController::class, 'index']);
    Route::get('/userdata', [UserController::class, 'index']);

    Route::controller(ResumeController::class)->group(function () {
        foreach (['save', 'submitJob', 'deleteFile'] as $key => $value) {
            Route::post('/resume/' . $value, $value);
        }
    });
    Route::get('/resume', function () {
        return view('resume');
    });

    Route::get('/resumepreview', function () {
        return view('resumepreview');
    });

    Route::get('/userprofile', function () {
        return view('userprofile');
    });

    Route::get('/editprofile', function () {
        return view('editprofile');
    });
});
