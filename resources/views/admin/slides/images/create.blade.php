@php $link = 'slide_images' @endphp
@extends('admin.layout')
@section('title')  اضافة صور السلايدات   @endsection

@include('admin.slides.images.shardMethod')

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
                    <h3 class="card-title">اضافة صور السلايدات </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->

                {!! Form::open(['role' => 'form', 'id' => 'form_add', 'method' => 'post', 'route' => 'admin.slide_images.store', 'files' => true]) !!}

                @include('admin.slides.images.form')

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
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item  active"> اضافة</li>

                        <li class="breadcrumb-item "><a href="{{ route('admin.categories.index') }}"> الصفحات</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">لوحة التحكم </a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

