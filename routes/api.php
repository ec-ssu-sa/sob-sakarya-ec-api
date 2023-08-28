<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ROPController;
use App\Http\Controllers\ROPLectureController;
use App\Http\Controllers\UserAuth;
use App\Http\Controllers\ECGAGroupPollController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:api')->group(function () {
    Route::controller(ECGAGroupPollController::class)->group(function () {
        Route::get('/ga-a-group/results', 'results');
    });
    Route::controller(ROPController::class)->group(function () {
        Route::post('/rop/results', 'results');
    });
    Route::controller(UserAuth::class)->group(
        function () {
            Route::get('/UserAuth/get-me', 'getMe');
            Route::post('/UserAuth/logout', 'logout');
        }
    );
});

Route::controller(UserAuth::class)->group(
    function () {
        Route::post('/UserAuth/register', 'register');
        Route::post('/UserAuth/login', 'login');
    }
);

Route::controller(ROPController::class)->group(function () {
    Route::post('/rop/check-member-eligibility', 'check_member_eligibility');
    Route::post('/rop/vote-submit', 'vote');
});

Route::controller(ECGAGroupPollController::class)->group(function () {
    Route::post('/ga-a-group/check-member-eligibility', 'check_member_eligibility');
    Route::post('/ga-a-group/vote-submit', 'vote');
});