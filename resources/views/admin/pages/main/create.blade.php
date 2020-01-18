@php $link = 'pages.static' @endphp
@extends('admin.layout')

@section('title', 'إضافة صفحة رئيسية')

@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">الصفحات الرئيسية</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">الصفحات الرئيسية</li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">البداية </a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <div class="d-flex justify-content-end mb-2">
        <button form="form_add" onclick="builder.setHtmlContent();" class="btn btn-primary"><i class="fa fa-save"></i></button>
    </div>
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">اضافة صفحة رئيسية</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                {!! Form::open(['route' => 'admin.pages.main.store', 'method' => 'post', 'role' => 'form', 'id' => 'form_add']) !!}
                    @include('admin.pages.main.form')
                {!! Form::close() !!}
            </div>

        </div>
        <!--/.col (left) -->
    </div>
@endsection

@section('js')

@endsection
