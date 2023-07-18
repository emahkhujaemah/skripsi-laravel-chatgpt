@extends('layouts.main')

@section('container')   
    <!-- Hero Start -->
    <div class="container-fluid pt-5 bg-primary hero-header">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                    <h1 class="display-4 text-white mb-4 animated slideInRight">Statistic</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center justify-content-lg-start mb-0">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Statistic</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 align-self-end text-center text-lg-end">
                    <img class="img-fluid" src="{{asset('chatgpt')}}/img/hero-img.png" alt="" style="max-height: 300px;">
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->

     <!-- About Start -->
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                <div id="piechart" style="height: 500px;"></div>
            </div>
            <div class="col-md-6 wow fadeIn" data-wow-delay="0.5s">
                <div id="piechart2" style="height: 500px;"></div>
            </div>
        </div>
    </div>
    <!-- About End -->




@endsection

