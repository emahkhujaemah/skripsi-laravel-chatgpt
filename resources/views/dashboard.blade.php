@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('plugins.Chartjs', true)

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
        <div class="col-lg-3 col-xs-6">
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
        </div>
        <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
        <!-- Left col -->
        <!-- PIE CHART -->
        <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title">Pie Chart</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->


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

@section('js')

<script> console.log('Hi!'); </script>
<script> 
    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.

    $(function(){
        var donutData        = {
        labels: [
            'Chrome',
            'IE',
            'FireFox',
            'Safari',
            'Opera',
            'Navigator',
        ],
        datasets: [
            {
            data: [700,500,400,600,300,100],
            backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            }
        ]
        }
        //-------------
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
        var pieData        = donutData;
        var pieOptions     = {
        maintainAspectRatio : false,
        responsive : true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        new Chart(pieChartCanvas, {
        type: 'pie',
        data: pieData,
        options: pieOptions
        })

    });

    </script>

@stop
