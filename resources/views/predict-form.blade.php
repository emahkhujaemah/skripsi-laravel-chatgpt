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
                            <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
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

    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 500px;">
                <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">Contact Us</div>
                <h1 class="mb-4">Tweet Sentiment </h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <p class="text-center mb-4">The contact form is currently inactive.</p>
                    <div class="wow fadeIn" data-wow-delay="0.3s">
                        <form id="prediction-form" method="POST" action="javascript:void(0)">
                            {{ csrf_field() }}
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="predict-input" placeholder="Predict Sentiment">
                                        <label for="predict-input">Sentiment Tweet</label>
                                    </div>
                                </div>
                                <button type="submit" style="border-radius: 20px;" class="btn btn-primary" id="prediction">Prediction</button>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <label for="predict-sentiment">Result</label>
                                        <h5 id="predict-sentiment"></h5>
                                    </div>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
        

    <!-- Newsletter Start -->
    <div class="container-fluid bg-primary newsletter py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-md-5 ps-lg-0 pt-5 pt-md-0 text-start wow fadeIn" data-wow-delay="0.3s">
                    <img class="img-fluid" src="{{asset('chatgpt')}}/img/newsletter.png" alt="">
                </div>
                <div class="col-md-7 py-5 newsletter-text wow fadeIn" data-wow-delay="0.5s">
                    <div class="btn btn-sm border rounded-pill text-white px-3 mb-3">Newsletter</div>
                    <h1 class="text-white mb-4">Let's subscribe the newsletter</h1>
                    <div class="position-relative w-100 mt-3 mb-2">
                        <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text"
                            placeholder="Enter Your Email" style="height: 48px;">
                        <button type="submit" class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2"><i
                                class="fa fa-paper-plane text-primary fs-4"></i></button>
                    </div>
                    <small class="text-white-50">Diam sed sed dolor stet amet eirmod</small>
                </div>
            </div>
        </div>
    </div>
    <!-- Newsletter End -->




@push('custom-scripts')

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>  --}}
    <script> console.log('Hi!'); </script>

    
    <script>
    
    const url = "{{ $baseApi }}" + 'api/predict-lstm';

    $(document).ready(function () {
            $('#prediction-form').submit(function (e) {
                e.preventDefault();
                var text = $('#predict-input').val();
                $.ajax({
                    url: "/api/predict-sentiment",
                    type: 'POST',
                    data: {
                        text: text,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        var result = response.sentiment;
                        $('#predict-sentiment').text(result);
                        console.log("success");
                    },
                    error: function (xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });

    </script>

@endpush

@endsection

