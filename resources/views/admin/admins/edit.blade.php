@php $link = 'admins' @endphp
@extends('admin.layout')

@section('title', 'تعديل مدير') 



@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">المدراء</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">المدراء</li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">البداية </a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
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
                    <h3 class="card-title">تعديل مدير</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                {!! Form::model($admin, ['role' => 'form', 'id' => 'form_add', 'method' => 'put', 'route' => ['admin.admins.update', $admin->id], 'files' => true]) !!}

                    @include('admin.admins.form')
                
                {!! Form::close() !!}
            </div>

        </div>
        <!--/.col (left) -->
    </div>
@endsection