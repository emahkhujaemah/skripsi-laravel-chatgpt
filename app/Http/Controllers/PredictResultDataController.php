<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PredictCNN;
use App\Models\PredictLSTM;
use App\Models\PredictResultData;
use App\Models\Category;
use PDF;

class PredictResultDataController extends Controller
{
    public function index()
    {
        $predictResultDatas = PredictResultData::all();

        return view('index-predict-result', compact('predictResultDatas'));
    }

    public function generatePDFcnn()
    {

        $data = PredictCNN::all();
        $pdf = PDF::loadView('index-export-cnn', ['data' => $data]);
        return $pdf->download('Data-CNN.pdf');
    }

    public function generatePDFlstm()
    {
        $data = PredictLSTM::all();
        $pdf = PDF::loadView('index-export-lstm', ['data' => $data]);
        return $pdf->download('Data-LSTM.pdf');
    }

    
}
