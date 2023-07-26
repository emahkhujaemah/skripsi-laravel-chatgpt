<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PredictResultData;
use App\Models\Category;

class PredictResultDataController extends Controller
{
    public function index()
    {
        $predictResultDatas = PredictResultData::all();
        $category = Category::all();

        return view('index-predict-result', compact();
    }
}
