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

// Route::get('/api/predict-sentiment', [PredictionSentimentController::class, 'sendRequestToFlaskAPI']);

Route::post('/api/prediction', function (Request $request) {
    $text = $request->input('text');

    
    // Example using Guzzle
    $client = new Client();
    $response = $client->post('http://localhost:5000/api/predict-lstm', [
        'json' => ['text' => $text],
    ]);

    // Retrieve the response from the TensorFlow.js server
    // $data = json_decode($response->getBody(), true);
    
    $result = json_decode($response->getBody(), true);

    // return response()->json($data);
    
    // Ambil hasil prediksi dari respons Flask
    $sentiment = $result['sentiment'];
    $confidence = $result['confidence'];

    // Lakukan sesuatu dengan hasil prediksi di Laravel
    // ...

    // Kembalikan respons ke halaman Laravel
    return response()->json([
        'sentiment' => $sentiment,
        'confidence' => $confidence
    ]);

});

Route::post('/api/predict-sentiment', function (Request $request) {
    $text = $request->input('text');

    // Forward the request to the Flask API
    $response = Http::post('http://localhost:5000/api/predict-lstm', [
        'text' => $text,
    ]);

    return $response->json();
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


Auth::routes([
    'register' => false
]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('/preprocessing-data', PreprocessingDataController::class);
Route::resource('/training-data', TrainingDataController::class);
Route::resource('/testing-data', TestingDataController::class);
Route::resource('/predict-result', PredictResultDataController::class);


// Route::post('/prediction', function (Request $request) {
//     $text = $request->input('text');

//     $client = new Client([
//         // 'base_uri' => 'http://localhost:5000',
//         'headers' => [
//             'Content-Type' => 'application/json',
//         ],
//     ]);

//     // Kirim data teks ke backend Flask menggunakan metode POST dengan header Content-Type: application/json
//     $response = Http::asJson()->post('http://localhost:5000/api/predict-lstm',[
//         'text' => "openai s chatgpt ios app now available in canada india brazil and more countries by"
//     ]);


//     $result = json_decode($response->getBody(), true);

    // // Ambil hasil prediksi dari respons Flask
    // $sentiment = $result['sentiment'];
    // $confidence = $result['confidence'];

    // // Lakukan sesuatu dengan hasil prediksi di Laravel
    // // ...

    // // Kembalikan respons ke halaman Laravel
    // return response()->json([
    //     'sentiment' => $sentiment,
    //     'confidence' => $confidence
    // ])->header('Content-Type', 'application/json');

// });
