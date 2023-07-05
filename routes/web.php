<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PreprocessingDataController;


Route::get('/', function () {
    return view('dashboard.landing-page');
});


Auth::routes([
    'register' => false
]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('/preprocessing-data', PreprocessingDataController::class);
Route::resource('/training-data', TrainingDataController::class);
Route::resource('/testing-data', TestingDataController::class);
Route::resource('/predict-result', PredictResultDataController::class);
