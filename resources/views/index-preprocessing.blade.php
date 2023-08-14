@extends('adminlte::page')
@section('title', 'Preprocessing Data')
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
                    {{-- <a href="{{ route('preprocessing-data.create') }}" class="btn btn-primary btn-sm mb-2"><i class="fa fa-fw fa-plus-square"></i>Import Data</a> --}}
                    <table class="table table-hover table-bordered table-stripped table-responsive p-0" id="example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Opinion</th>
                                <th>Category</th>
                                {{-- <th>Aksi</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($preprocessingDatas as $preprocessingData)
                            <tr>
                                <td> {{$loop->iteration}} </td>
                                <td>{{$preprocessingData->opinion}}</td>
                                <td>{{$preprocessingData->category->name_category}}</td>
                                {{-- <td width="5%">
                                    <div class="btn btn-group">
                                        <a href="{{ route('santri.show', $santri) }}" class="btn btn-sm btn-success" ><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('santri.edit', $santri) }}" class="btn btn-sm btn-warning" ><i class="fas fa-edit"></i></a>
                                        <a href="{{route('preprocessing-data.destroy', $preprocessingDatas)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                    </div>
                                </td> --}}
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
            'iDisplayLength': 10
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
