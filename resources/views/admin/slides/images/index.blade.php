@php $link = 'slide_images' @endphp
@extends('admin.layout')
@include('admin.helperFiles.js.dataTable_files')
@section('title')صور السلايدات @endsection
@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ route('admin.slide_images.create') }}" class="btn btn-primary"><i
                class="fa fa-plus"></i></a>

        {{--        @if(isset($cat_id) and $deleted==false)  <a   style="float: left" href="{{ route('admin.slide_images.deleted', $cat_id) }}" class="btn btn-primary"><i class="fa fa-eye"> عرض المحذوفة </i></a>@endif--}}
        {{--        @if(isset($cat_id) and $deleted==true)  <a   style="float: left" href="{{ route('admin.slide_images.index', $cat_id) }}" class="btn btn-primary"><i class="fa fa-eye"> عرض الغير محذوفة </i></a>@endif--}}

    </div>
    cat_id


    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <!-- /.card-header -->
            <div class="x_content">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th> الصورة</th>
                        <th> النص على الصورة</th>
                        <th> السلايدات الي تعرض فية</th>
                        <th> المنشى</th>
                        <th> تاريخ الانشاء</th>
                        @if($deleted==false)
                            <th> الترتيب</th>
                            <th> الحالة</th>
                            <th> تعديل</th>
                        @endif

                        @if($deleted==true)
                            <th>حذفة بواسطة</th>
                            <th>تاريخ الحذف</th>
                            <th>استعادة</th>
                        @endif
                        <th>حذف</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($slide_images as $slide_image)
                        <tr>
                            <td><img src="{{isset($slide_image->image)? url($slide_image->image):null}} " alt="لايوجد"
                                     width="100px"></td>

                            <td>{{ $slide_image->text }}</td>
                            <td>{!! Names($slide_image->slides,'Slide') !!}</td>
                            <td>{{ getUserName($slide_image->created_by) }}</td>


                            <td>{{ $slide_image->created_at }}</td>

                            @if($deleted==false)
                                <td>{{ $slide_image->sort }}</td>
                                <td>{{ $slide_image->status == '1' ? 'مفعل' : 'معطل' }}</td>

                                <td class="text-center">
                                    <a href="{{ route('admin.slide_images.edit', $slide_image->id) }}"
                                       class="btn btn-primary"><i
                                            class="fa fa-pencil"></i></a>
                                </td>
                            @else
                                <th>{{getUserName( $slide_image->deleted_by )}}</th>
                                <td>{{ $slide_image->deleted_at }}</td>


                                <td class="text-center">
                                    <a href="{{  route('admin.slide_images.restore',encrypt( $slide_image->id)) }}"
                                       class="btn btn-primary"><i
                                            class="fa fa-arrow-up"></i></a>
                                </td>

                            @endif


                            <td class="text-center">
                                <a href="{{ ($deleted==false) ?route('admin.slide_images.delete',encrypt( $slide_image->id)) : route('admin.news.forceDelete',encrypt( $slide_image->id)) }}"
                                   onclick="return confirm('هل أنت متأكد من الحذف');" class="btn btn-danger"><i
                                        class="fa fa-trash"></i></a>
                            </td>


                        </tr>
                    @endforeach
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection

@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> صور السلايدات </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">صور السلايدات</li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">البداية </a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection




