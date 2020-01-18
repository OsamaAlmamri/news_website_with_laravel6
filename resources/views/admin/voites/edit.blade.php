@php $link = 'voites' @endphp
@extends('admin.layout')
@section('title') تعديل التصويتات    @endsection
@include('admin.voites.shardMethod')
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
                    <h3 class="card-title">تعديل التصويتات    </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->

                {!! Form::model($voit, ['route' => ['admin.voites.update', $voit->id], 'method' => 'put', 'id' => 'form_add', 'files' => true]) !!}

                @include('admin.voites.form')

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
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">    تعديل</li>
                        <li class="breadcrumb-item "> <a href="{{ route('admin.liveNews.index') }}"> التصويتات   </a>  </li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">لوحة التحكم </a></li>

                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

