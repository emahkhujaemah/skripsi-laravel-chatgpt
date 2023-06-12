@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>5000</h3>

                    <p>Data Training</p>
                </div>
                <div class="icon">
                    <i class="fas fa-fw fa-person-booth"></i>  
                </div>
                <a href="/data-training" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                <div class="inner">
                    <h3>2000</h3>
                    <p>Data Testing</p>
                </div>
                <div class="icon">
                    <i class="fas fas fa-id-card"></i>
                    {{-- <i class="fa-solid fa-id-card-clip"></i> --}}
                </div>
                <a href="/data-testing" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>3</h3>
                    <p>Hasil Prediksi</p>
                </div>
            <div class="icon">
                <i class="fas fa-fw fa-money-bill-wave"></i>
            </div>
                <a href="/guru" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        {{-- <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>8</h3>
                    <p>Lokasi</p>
                </div>
            <div class="icon">
                <i class="fas fa-fw fa-house-user"></i>
            </div>
            <a href="/pelajaran" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div> --}}
        <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
        <!-- Left col -->
        <!-- right col -->
        </div>
        <!-- /.row (main row) -->

        <div class="row m-4">
            <div class="col-lg">
                <div  class="text-center"> 
                {{-- <img src="{{asset('img/madrasah.png')}}" class="img-fluid" alt="Madrasah" style="height:320px;"> --}}
                </div>
            </div>
        </div>
    </section>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop