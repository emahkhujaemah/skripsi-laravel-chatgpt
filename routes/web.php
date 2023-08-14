<?php

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TrainingDataController;
use App\Http\Controllers\TestingDataController;
use App\Http\Controllers\PreprocessingDataController;
use App\Http\Controllers\PredictResultDataController;
use App\Http\Controllers\StatisticController;


Route::get('/', function () {
    return view('landing-page');
});
Route::get('/sentiment', function () {
    return view('predict-form');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/statistic', [StatisticController::class, 'showChart'])->name('statistic');

Auth::routes([
    'register' => false
]);

// Graph
Route::get('/sentiment-chart/dataAll', [HomeController::class, 'getSentimentChartData'])->name('sentiment-chart.dataAll');
Route::get('/sentiment-chart/dataPredict', [HomeController::class, 'getSentimentChartPredict'])->name('sentiment-chart.dataPredict');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::resource('/preprocessing-data', PreprocessingDataController::class);
    Route::resource('/training-data', TrainingDataController::class);
    Route::resource('/testing-data', TestingDataController::class);
    Route::resource('/predict-result', PredictResultDataController::class);
    Route::get('generate-pdf-cnn', [PredictResultDataController::class, 'generatePDFcnn'])->name('export-cnn');
    Route::get('generate-pdf-LSTM', [PredictResultDataController::class, 'generatePDFlstm'])->name('export-lstm');
});


// API
Route::post('/api/prediction-cnn', function (Request $request) {
    $text = $request->input('text');
    // Example using Guzzle
    $client = new Client();
    $response = $client->post('http://localhost:5000/api/predict-cnn', [
        'json' => ['text' => $text],
    ]);

    // Retrieve the response from the TensorFlow.js server
    $result = json_decode($response->getBody(), true);
    
    // Ambil hasil prediksi dari respons Flask
    $sentiment = $result['sentiment'];
    $confidence = $result['confidence'];

    // Kembalikan respons ke halaman Laravel
    return response()->json([
        'sentiment' => $sentiment,
        'confidence' => $confidence,
    ]);

});

Route::post('/api/prediction-lstm', function (Request $request) {
    $text = $request->input('text');

    // Example using Guzzle
    $client = new Client();
    $response = $client->post('http://localhost:5000/api/predict-lstm', [
        'json' => ['text' => $text],
    ]);

    // Retrieve the response from the TensorFlow.js server
    $result = json_decode($response->getBody(), true);
    
    // Ambil hasil prediksi dari respons Flask
    $sentiment = $result['sentiment'];
    $confidence = $result['confidence'];


    // Kembalikan respons ke halaman Laravel
    return response()->json([
        'sentiment' => $sentiment,
        'confidence' => $confidence,
    ]);

});


Route::get('/api', function (Request $request) {
    // Example using Guzzle
    $client = new Client();
    $api_url = "http://localhost:5000/api";
    $response = $client->get($api_url);

    $data = $response->getBody();
    $api = $data;

    return $api;
});




