<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>AdminLTE 3 | Rekap Nilai</title>

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
{{-- <link rel="stylesheet" href="{{asset('vendor')}}/fontawesome-free/css/all.min.css"> --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    </head>
    <body>
        <h1>Selamat</h1>
        {{-- <section class="content">

            <div class="container-fluid">
            <div class="row">
                <div class="col-12">
        
                <!-- /.card -->
                <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tabel Data Convolution Neural Network</h1>
                </div>
                </section>
                    <div class="card">
                        <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Text</th>
                                    <th>Category</th>
                                    <th>Confidence</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                <tr>
                                    <td> {{$loop->iteration}} </td>
                                    <td>{{$d->text}}</td>
                                    <td>{{$d->sentiment}}</td>
                                    <td>{{$d->confidence}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section> --}}
        {{-- <script>
            window.addEventListener("load", window.print());
        </script> --}}
    </body>
</html>


