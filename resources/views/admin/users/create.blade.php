@php $link = 'products' @endphp
@extends('admin.layout')

@section('title') اضافة مستخدم  @endsection
@section('style')
    <link href="{{url('vendors/google-code-prettify/bin/prettify.min.css')}}" rel="stylesheet">

    <!-- Select2 -->
    <link href="{{url('vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet">
    <!-- Switchery -->
    <link href="{{url('vendors/switchery/dist/switchery.min.css')}}" rel="stylesheet">
    <!-- starrr -->
    <link href="{{url('vendors/starrr/dist/starrr.css')}}" rel="stylesheet">

    <style>

    </style>

@endsection

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
                    <h3 class="card-title">اضافة مستخدم</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->

                {!! Form::open(['role' => 'form', 'id' => 'form_add', 'method' => 'post', 'route' => 'admin.users.store', 'files' => true]) !!}

                @include('admin.users.form')

                {!! Form::close() !!}
            </div>

        </div>
        <!--/.col (left) -->
    </div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}">
@endsection

@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">اضافة مستخدم</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">اضافة مستخدم</li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">البداية </a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('js')
    <script>
        var image_row = "0";

    </script>

    @include('admin.users.shardMethod')


@endsection

@section('scripts')

    <!-- jQuery Tags Input -->
    <script src="{{url('vendors/jquery.tagsinput/src/jquery.tagsinput.js')}}"></script>
    <!-- Switchery -->
    <script src="{{url('vendors/switchery/dist/switchery.min.js')}}"></script>
    <!-- Select2 -->
    <script src="{{url('vendors/select2/dist/js/select2.full.min.js')}}"></script>
    <!-- Parsley -->
    <script src="{{url('vendors/parsleyjs/dist/parsley.min.js')}}"></script>
    <script src="{{url('vendors/parsleyjs/dist/i18n/fa.js')}}"></script>
    <!-- Autosize -->
    <script src="{{url('vendors/autosize/dist/autosize.min.js')}}"></script>
    <!-- jQuery autocomplete -->
    <script src="{{url('vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js')}}"></script>
    <!-- starrr -->
    <script src="{{url('vendors/starrr/dist/starrr.js')}}"></script>

    <!-- Custom Theme Scripts -->

@endsection


