<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\TestingData;
use App\Models\Category;

class TestingDataController extends Controller
{
    public function index()
    {
        // $testingDatas = TestingData::all();
        $category = Category::all();

        return view('index-testing-data', compact(['category']));
    }
}
