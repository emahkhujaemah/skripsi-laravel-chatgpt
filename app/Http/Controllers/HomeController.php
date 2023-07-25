<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PreprocessingData;
use App\Models\TrainingData;
use App\Models\TestingData;
use App\Models\PredictResultData;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $preprocessingCounts = PreprocessingData::count();
        $trainingCounts = TrainingData::count();
        $testingCounts = TestingData::count();
        $predictResultCounts = PredictResultData::count();

        return view('dashboard', 
        compact(['preprocessingCounts', 'trainingCounts', 'testingCounts', 'predictResultCounts']));
    }

    public function showChart()
    {
        return view('sentiment_chart');
    }

    public function getSentimentChartData()
    {
        $sentimentData = [];

        // Query untuk mendapatkan data dari tabel sentiments
        $sentiments = TrainingData::all();

        // Hitung jumlah sentimen untuk setiap label
        $sentimentData[] = $sentiments->where('category_id', 1)->count();
        $sentimentData[] = $sentiments->where('category_id', 2)->count();
        $sentimentData[] = $sentiments->where('category_id', 3)->count();

        return response()->json($sentimentData);
    }

    public function getSentimentChartPredict()
    {
        $sentimentDataPredict = [];

        // Query untuk mendapatkan data dari tabel sentiments
        $sentimentPredict = PredictResultData::all();

        // Hitung jumlah sentimen untuk setiap label
        $sentimentDataPredict[] = $sentimentPredict->where('sentiment', 'Negative')->count();
        $sentimentDataPredict[] = $sentimentPredict->where('sentiment', 'Neutral')->count();
        $sentimentDataPredict[] = $sentimentPredict->where('sentiment', 'Positive')->count();

        return response()->json($sentimentDataPredict);
    }
}
