@php $link = 'statistics' @endphp
@extends('admin.layout')

@include('statistics.shardMethod')
@section('title') اضافة احصائية  @endsection
@section('content')

    <div class="d-flex justify-content-end mb-2">
        <button form="form_add" class="btn btn-primary"><i class="fa fa-save"></i></button>
    </div>
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">اضافة احصائية</h3>
                </div>

                {!! Form::open(['role' => 'form', 'id' => 'form_add', 'method' => 'post', 'route' => 'admin.statistics.store']) !!}

                @include('statistics.form')

                {!! Form::close() !!}
            </div>

        </div>
        <!--/.col (left) -->
    </div>
@endsection

@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">اضافة احصائية</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">اضافة احصائية</li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">البداية </a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

