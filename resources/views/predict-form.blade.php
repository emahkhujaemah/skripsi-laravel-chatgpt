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

    <!-- Contact Start -->
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
                        <form id="prediction-form" method="POST" action="javascript:void(0)">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="predict-input" placeholder="Predict Sentiment">
                                        <label for="predict-input">Sentiment Tweet</label>
                                    </div>
                                </div>
                                {{-- <button type="submit" style="border-radius: 20px;" class="btn btn-primary" id="prediction">Prediction LSTM</button> --}}
                                <button type="submit" style="border-radius: 20px;" class="btn btn-primary" id="prediction">Prediction CNN</button>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <h3 class="text-center mb-4">Result</h3>
                                        <h5 class="mb-4 text-primary" id="predict-sentiment"> </h5>
                                        <h5 class="mb-4 text-primary" id="predict-confidence"> </h5>
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
                    <img class="img-fluid"  src="{{asset('chatgpt')}}/img/newsletter.png" alt="">
                </div>
                <div class="col-md-7 py-5 newsletter-text wow fadeIn" data-wow-delay="0.5s">
                    <div class="btn btn-sm border rounded-pill text-white px-3 mb-0 mt-5">Create By Emah Khujaemah</div>
                    <div class="d-flex align-items-center mt-4">
                        <a class="btn border rounded-pill text-white px-4 me-3" href="">Let's Connect</a>
                        
                        <a class="btn btn-outline-light btn-square me-3" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-square me-3" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-square me-3" href=""><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-outline-light btn-square" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
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
            url: "/api/prediction",
            type: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            data: JSON.stringify({
                text: text,
                _token: '{{ csrf_token() }}'
            }),
            success: function (response) {
                var result_sentiment = response.sentiment;
                var result_confidence = response.confidence;
                $('#predict-sentiment').text(result_sentiment);
                $('#predict-confidence').text(result_confidence);
                console.log("success");
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText);
            }
            });
        });
    });

    // // Ambil elemen formulir
    // var form = document.getElementById('prediction-form');

    // // Tangkap peristiwa submit formulir
    // form.addEventListener('submit', function(event) {
    //     event.preventDefault(); // Mencegah perilaku default pengiriman formulir
    //     // Ambil nilai input teks
    //     var sentimentInput = document.getElementById('predict-input').value;
    //     // Buat objek data untuk dikirim ke server
    //     var data = {
    //         sentiment: sentimentInput
    //     };

    //     // Kirim permintaan AJAX ke server
    //     var xhr = new XMLHttpRequest();
    //     xhr.open('POST', '/prediction', true); // Ganti '/prediction' dengan URL endpoint yang sesuai di server Anda
    //     xhr.setRequestHeader('Content-Type', 'application/json');

    //     xhr.onreadystatechange = function() {
    //         if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
    //             // Tangkap respons dari server
    //             var response = JSON.parse(xhr.responseText);

    //             // Tampilkan hasil prediksi
    //             var resultElement = document.getElementById('predict-sentiment');
    //             resultElement.textContent = response.result;
    //         }
    //     };

    //     // Kirim data ke server dalam format JSON
    //     xhr.send(JSON.stringify(data));
    // });


    </script>

@endpush

@endsection

