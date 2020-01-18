@php $link = 'customer_groups' @endphp
@extends('admin.layout')

@section('title', 'مجموعات المدراء')



@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">مجموعات المدراء</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">مجموعات المدراء</li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.admin_groups.index') }}">البداية </a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <div class="d-flex justify-content-end">
        <button form="add_form" class="btn btn-primary mb-2"><i class="fa fa-save"></i></button>
    </div>
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">اضافة مجموعة المدراء </h3>
                </div>
                {!! Form::open(['route' => 'admin.admin_groups.store', 'method' => 'post', 'id' => 'add_form']) !!}
                    @include('admin.admin_groups.form')
                {!! Form::close() !!}
            </div>

        </div>
        <!--/.col (left) -->
    </div>
@endsection


@section('js')
    <script>

        $(function () {

            //Initialize Select2 Elements
            $('.select2').select2()
        })
    </script>
@endsection


@section('scripts')
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
@endsection