<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PredictionSentimentController extends Controller
{
    private $uri = 'https://data.covid19.go.id/public/api/';

    public function getCovid19Case()
    {
        $client = new Client();

        $options = [
            'verify' => false,
            'Accept' => 'application/json', 
        ];

        $response = $client->get($this->uri . 'prov.json' , $options)->getBody()->getContents();

        $response_json = json_decode($response);

        return response()->json($response_json, 200);
    }

    public function sendRequestToFlaskAPI()
    {
        $text = $request->input('text');

        $client = new Client();

        $options = [
            'verify' => false,
            'Accept' => 'application/json', 
        ];
        
        $response = $client->Http::post('http://localhost:5000/api/predict-cnn', [
            'json' => [
                'text' => $text
            ]
        ]);
        
        // Tangkap respons dari Flask API
        $responseData = $response->getBody()->getContents();
        
        // Lakukan pengolahan respons sesuai kebutuhan
        // ...
        
        // Kembalikan respons atau lakukan tindakan lain
        // ...
    }
}
