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
                    <h3>{{$preprocessingCounts}}</h3>

                    <p>Preprocessing Data</p>
                </div>
                <div class="icon">
                    <i class="fas fa-fw fa-chart-pie"></i>  
                </div>
                <a href="/data-training" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{$trainingCounts}}</h3>
                    <p>Training Data</p>
                </div>
                <div class="icon">
                    <i class="fas fas fa-th"></i>
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
                    <h3>{{$testingCounts}}</h3>
                    <p>Testing Data</p>
                </div>
            <div class="icon">
                <i class="fas fa-fw fa-edit"></i>
            </div>
                <a href="/guru" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{$predictResultCounts}}</h3>
                    <p>Predict Result Data</p>
                </div>
            <div class="icon">
                <i class="fas fa-fw fa-image"></i>
            </div>
            <a href="/pelajaran" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            
        <div class="col-md-6">
        <!-- Left col -->
        <!-- PIE CHART -->
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">All Dataset Chart</h3>

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
        </div>

        <!-- DONUT CHART -->
        <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Predict Result Chart</h3>

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
              <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

        <!-- right col -->
        
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
    $(function () {
        $.ajax({
            url: "{{ route('sentiment-chart.dataAll') }}",
            method: "GET",
            success: function (data) {
                var labels = ['Negative', 'Neutral', 'Positive'];
                var datasetData = data;

                var ctx = document.getElementById('pieChart').getContext('2d');
                var sentimentChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Sentiment Count',
                            data: datasetData,
                            backgroundColor: ['#f56954','#d2d6de', '#00c0ef'],
                            borderColor: ['#f56954','#d2d6de', '#00c0ef'],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        maintainAspectRatio : false,
                        responsive : true,
                    }
                });
            }
        });
    });
</script>

<script>
    $(function () {
        $.ajax({
            url: "{{ route('sentiment-chart.dataPredict') }}",
            method: "GET",
            success: function (data) {
                var labels = ['Negative', 'Neutral', 'Positive'];
                var datasetData = data;
                var ctx = document.getElementById('donutChart').getContext('2d');
                var sentimentChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Sentiment Count',
                            data: datasetData,
                            backgroundColor: ['#f56954','#d2d6de', '#00c0ef'],
                            borderColor: ['#f56954','#d2d6de', '#00c0ef'],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        maintainAspectRatio : false,
                        responsive : true,
                    }
                });
            }
        });
    });
</script>

@stop
