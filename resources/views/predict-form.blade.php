@extends('layouts.main')

@section('container')
    <!-- Hero Start -->
    <div class="container-fluid pt-5 bg-primary hero-header">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                    <h1 class="display-4 text-white mb-4 animated slideInRight">Predict Form</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center justify-content-lg-start mb-0">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Predict Form</li>
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

    <!-- Prediction Form CNN Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 500px;">
                <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">Prediction CNN</div>
                <h1 class="mb-4">Prediction Sentiment</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <p class="text-center mb-4">Prediction Sentiment from Tweets Twitter about ChatGPT</p>
                    <div class="wow fadeIn" data-wow-delay="0.3s">
                        <form id="prediction-form-cnn" method="POST" action="javascript:void(0)">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="predict-input-cnn" placeholder="Predict Sentiment">
                                        <label for="predict-input-cnn">Sentiment Tweet</label>
                                    </div>
                                </div>
                                {{-- <button type="submit" style="border-radius: 20px;" class="btn btn-primary" id="prediction">Prediction LSTM</button> --}}
                                <button type="submit" style="border-radius: 20px;" class="btn btn-primary" id="prediction">Prediction CNN</button>
                                <div class="col-md-12">
                                    <div class="form-floating text-center ">
                                        <h3 class="mb-2">Result</h3>
                                        <h5 class="text-primary" id="predict-sentiment-cnn"> </h5>
                                        <h5 class="text-primary" id="predict-confidence-cnn"> </h5>
                                    </div>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Prediction Form CNN End -->
        

    <!-- Footer Start -->
    <div class="container-fluid bg-primary newsletter py-5">

    </div>
    <!-- Footer End -->

    <!-- Prediction Form lSTM Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 500px;">
                <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">Prediction LSTM</div>
                <h1 class="mb-4">Prediction Sentiment</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <p class="text-center mb-4">Prediction Sentiment from Tweets Twitter about ChatGPT</p>
                    <div class="wow fadeIn" data-wow-delay="0.3s">
                        <form id="prediction-form-lstm" method="POST" action="javascript:void(0)">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="predict-input-lstm" placeholder="Predict Sentiment">
                                        <label for="predict-input-lstm">Sentiment Tweet</label>
                                    </div>
                                </div>
                                <button type="submit" style="border-radius: 20px;" class="btn btn-primary" id="prediction">Prediction LSTM</button>
                                <div class="col-md-12">
                                    <div class="form-floating text-center ">
                                        <h3 class="mb-2">Result</h3>
                                        <h5 class="text-primary" id="predict-sentiment-lstm"> </h5>
                                        <h5 class="text-primary" id="predict-confidence-lstm"> </h5>
                                    </div>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Prediction Form lSTM End -->

@push('custom-scripts')

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>  --}}
    <script> console.log('Hi!'); </script>

    <script> 
    const url = "{{ $baseApi }}" + 'api/predict-lstm';

    $(document).ready(function () {
        $('#prediction-form-cnn').submit(function (e) {
            e.preventDefault();
            var text = $('#predict-input-cnn').val();
            $.ajax({
            url: "/api/prediction-cnn",
            type: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            data: JSON.stringify({
                text: text,
                _token: '{{ csrf_token() }}'
            }),
            success: function (response) {
                var result_sentiment_cnn = response.sentiment;
                var result_confidence_cnn = response.confidence;
                $('#predict-sentiment-cnn').text(result_sentiment_cnn);
                $('#predict-confidence-cnn').text(result_confidence_cnn);
                console.log("success");
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText);
            }
            });
        });

        $('#prediction-form-lstm').submit(function (e) {
            e.preventDefault();
            var text = $('#predict-input-lstm').val();
            $.ajax({
            url: "/api/prediction-lstm",
            type: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            data: JSON.stringify({
                text: text,
                _token: '{{ csrf_token() }}'
            }),
            success: function (response) {
                var result_sentiment_lstm = response.sentiment;
                var result_confidence_lstm = response.confidence;
                $('#predict-sentiment-lstm').text(result_sentiment_lstm);
                $('#predict-confidence-lstm').text(result_confidence_lstm);
                console.log("success");
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText);
            }
            });
        });
        
    });

    // $(document).ready(function () {

    // });



    </script>

@endpush

@endsection

