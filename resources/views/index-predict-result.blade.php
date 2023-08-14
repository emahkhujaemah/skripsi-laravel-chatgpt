@extends('adminlte::page')
@section('title', 'Predict Result Data')
@section('content_header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1>Tabel @yield('title')</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active"> @yield('title')</li>
        </ol>
    </div>
    </div>
@stop
@section('content')
    <div class="row">
        <div class="col-12">

            @if (session('pesan'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismis="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i>Success:</h4>
                {{session('pesan')}}
            </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <a href="{{ route('export-cnn') }}" class="btn btn-primary btn-sm mb-2"><i class="fas fa-download"></i>Export CNN</a>
                    <a href="{{ route('export-lstm') }}" class="btn btn-success btn-sm mb-2"><i class="fas fa-download"></i>Export LSTM</a>
                    <table class="table table-hover table-bordered table-stripped table-responsive p-0" id="example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Text</th>
                                <th>Category</th>
                                <th>Confidence</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($predictResultDatas as $predictResultData)
                            <tr>
                                <td> {{$loop->iteration}} </td>
                                <td>{{$predictResultData->text}}</td>
                                <td>{{$predictResultData->sentiment}}</td>
                                <td>{{$predictResultData->confidence}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>

@stop
@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#example').DataTable({
            "responsive": true,
            'iDisplayLength': 10,
            "buttons": ["copy", "excel",
            {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'LEGAL' 
            }]
        });


        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }
    </script>
@endpush
