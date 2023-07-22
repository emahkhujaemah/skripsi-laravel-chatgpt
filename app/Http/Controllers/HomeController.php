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
        // $predictResultDatas = PredictResultData::all();
        $preprocessingCounts = PreprocessingData::all()->count();
        $trainingCounts = TrainingData::all()->count();
        $testingCounts = TestingData::all()->count();
        $predictResultCounts = PredictResultData::all()->count();

        return view('dashboard', 
        compact(['preprocessingCounts', 'trainingCounts', 'testingCounts', 'predictResultCounts']));
    }
}
