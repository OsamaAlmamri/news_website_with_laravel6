@php $link = 'products' @endphp
@extends('admin.layout')

@section('title') تعديل المنتج  @endsection
@section('style')
    <link rel="stylesheet" href="{{url('dist/css/form_product.css')}}">
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
                    <h3 class="card-title">اضافة منتج</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                {!! Form::model($product, ['route' => ['admin.products.update', $product->id], 'method' => 'put', 'id' => 'form_add', 'files' => true]) !!}

                @include('admin.products.form')
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
                    <h1 class="m-0 text-dark">اضافة منتج</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">اضافة منتج</li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">البداية </a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('js')




    <script type="text/javascript">
        function deleteOldImage(id, encId) {
            $('#old-image-row' + id).remove();
            var newInput = '<input type="hidden" name="imageDeletedId[]" value="' + encId + '">';
            $('#form_add').html($('#form_add').html() + newInput)


        }

        function deleteSpecial(id) {
            $('#old-special-row' + id).remove();
            var newInput = '<input type="hidden" name="specialDeletedId[]" value="' + id + '">';
            $('#form_add').html($('#form_add').html() + newInput)


        }

        function deleteDiscount(id) {
            $('#old_discount_row' + id).remove();
            var newInput = '<input type="hidden" name="discountDeletedId[]" value="' + id + '">';
            $('#form_add').html($('#form_add').html() + newInput)


        }

        var image_row = "{{count($product->images)+1}}";
    </script>
    @include('admin.products.shardMethod')
@endsection

@section('scripts')


    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="{{ asset('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
    <!-- InputMask -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
    <!-- date-range-picker -->
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- bootstrap color picker -->
    <script src="{{ asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Bootstrap Switch -->
    <script src="{{ asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
@endsection
