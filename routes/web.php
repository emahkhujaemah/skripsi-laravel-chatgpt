<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PreprocessingDataController;
use App\Http\Controllers\API\PredictionSentimentController;


Route::get('/', function () {
    return view('landing-page');
});
Route::get('/sentiment', function () {
    return view('predict-form');
});
Route::get('/statistic', function () {
    return view('statistic');
});
Route::get('/about', function () {
    return view('about');
});

Route::get('/api/predict-sentiment', [PredictionSentimentController::class, 'sendRequestToFlaskAPI']);

// Route::post('/api/predict-sentiment', function (Request $request) {
//     $text = $request->input('text');

//     // Forward the request to the Flask API
//     $response = Http::post('http://localhost:5000/api/predict-lstm', [
//         'text' => $text,
//     ]);

//     return $response->json();
// });


Auth::routes([
    'register' => false
]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('/preprocessing-data', PreprocessingDataController::class);
Route::resource('/training-data', TrainingDataController::class);
Route::resource('/testing-data', TestingDataController::class);
Route::resource('/predict-result', PredictResultDataController::class);
