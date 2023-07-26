<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PredictLSTM;
use App\Models\PredictCNN;
use App\Models\PredictResultData;

class StatisticController extends Controller
{
    public function showChart()
    {
        $sentimentDataPredictCNN = [];
        $sentimentDataPredictLSTM = [];

        // Query untuk mendapatkan data dari tabel sentiments
        $sentimentPredictCNN = PredictCNN::all();
        $sentimentPredictLSTM = PredictLSTM::all();

        $labels = ['Negative', 'Neutral', 'Positive'];
        $labels2 = ['Negative', 'Neutral', 'Positive'];

        // Hitung jumlah sentimen untuk setiap label CNN
        $sentimentDataPredictCNN[] = $sentimentPredictCNN->where('sentiment', 'Negative')->count();
        $sentimentDataPredictCNN[] = $sentimentPredictCNN->where('sentiment', 'Neutral')->count();
        $sentimentDataPredictCNN[] = $sentimentPredictCNN->where('sentiment', 'Positive')->count();

        $sentimentDataPredictGraphCNN = [];
        foreach ($labels as $index => $label) {
            $sentimentDataPredictGraphCNN[] = [$label, $sentimentDataPredictCNN[$index]];
        }

        // Hitung jumlah sentimen untuk setiap label LSTM
        $sentimentDataPredictLSTM[] = $sentimentPredictLSTM->where('sentiment', 'Negative')->count();
        $sentimentDataPredictLSTM[] = $sentimentPredictLSTM->where('sentiment', 'Neutral')->count();
        $sentimentDataPredictLSTM[] = $sentimentPredictLSTM->where('sentiment', 'Positive')->count();

        $sentimentDataPredictGraphLSTM = [];
        foreach ($labels2 as $index2 => $label2) {
            $sentimentDataPredictGraphLSTM[] = [$label2, $sentimentDataPredictLSTM[$index2]];
        }
        return view('statistic', compact(['sentimentDataPredictGraphCNN', 'sentimentDataPredictGraphLSTM']));
    }

    public function getSentimentChartCNN()
    {
        $sentimentDataPredictCNN = [];
        $sentimentDataPredictLSTM = [];

        // Query untuk mendapatkan data dari tabel sentiments
        $sentimentPredictCNN = PredictCNN::all();
        $sentimentPredictLSTM = PredictLSTM::all();

        $labels = ['Negative', 'Neutral', 'Positive'];
        $labels2 = ['Negative', 'Neutral', 'Positive'];

        // Hitung jumlah sentimen untuk setiap label CNN
        $sentimentDataPredictCNN[] = $sentimentPredictCNN->where('sentiment', 'Negative')->count();
        $sentimentDataPredictCNN[] = $sentimentPredictCNN->where('sentiment', 'Neutral')->count();
        $sentimentDataPredictCNN[] = $sentimentPredictCNN->where('sentiment', 'Positive')->count();

        $sentimentDataPredictGraphCNN = [];
        foreach ($labels as $index => $label) {
            $sentimentDataPredictGraphCNN[] = [$label, $sentimentDataPredictCNN[$index]];
        }

        // Hitung jumlah sentimen untuk setiap label LSTM
        $sentimentDataPredictLSTM[] = $sentimentPredictLSTM->where('sentiment', 'Negative')->count();
        $sentimentDataPredictLSTM[] = $sentimentPredictLSTM->where('sentiment', 'Neutral')->count();
        $sentimentDataPredictLSTM[] = $sentimentPredictLSTM->where('sentiment', 'Positive')->count();

        $sentimentDataPredictGraphLSTM = [];
        foreach ($labels2 as $index2 => $label2) {
            $sentimentDataPredictGraphLSTM[] = [$label2, $sentimentDataPredictLSTM[$index2]];
        }

        return response()->json([$sentimentDataPredictGraphCNN, $sentimentDataPredictLSTM]);
    }

    public function getSentimentChartLSTM()
    {
        $sentimentDataPredict = [];

        // Query untuk mendapatkan data dari tabel sentiments
        $sentimentPredict = PredictResultData::all();

        $labels = ['Negative', 'Neutral', 'Positive'];

        // Hitung jumlah sentimen untuk setiap label
        $sentimentDataPredict[] = $sentimentPredict->where('sentiment', 'Negative')->count();
        $sentimentDataPredict[] = $sentimentPredict->where('sentiment', 'Neutral')->count();
        $sentimentDataPredict[] = $sentimentPredict->where('sentiment', 'Positive')->count();

        $sentimentDataPredictGraph = [];
        foreach ($labels as $index => $label) {
            $sentimentDataPredictGraph[] = [$label, $sentimentDataPredict[$index]];
        }
        return view('statistic', compact('sentimentDataPredictGraph'));
    }
}
