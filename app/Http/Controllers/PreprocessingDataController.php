<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PreprocessingData;
use App\Models\Category;

class PreprocessingDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preprocessingDatas = PreprocessingData::all();
        $category = Category::all();

        return view('index-preprocessing', compact(['preprocessingDatas', 'category']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PreprocessingData  $preprocessingDatas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $preprocessingDatas = PreprocessingData::find($id);
        $preprocessingDatas->delete();
        return redirect('/preprocessing-data')->with('pesan', 'Data Berhasil Dihapus !');
    }
}
