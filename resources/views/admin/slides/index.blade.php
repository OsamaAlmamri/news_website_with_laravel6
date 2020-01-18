@php $link = 'slides' @endphp
@extends('admin.layout')

@section('title') الاقسام  @endsection
@include('admin.helperFiles.js.dataTable_files')

@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ route('admin.slides.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <!-- /.card-header -->
            <div class="x_content">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>الاسم العربي</th>
                        <th> الصفحات الذي تعرض فية</th>
                        @if($deleted==false)
                       >
                            <th>الحالة</th>
                            <th>عرض</th>
                            <th>تعديل</th>
                        @else
                            <th>حذفة بواسطة</th>
                            <th>تاريخ الحذف</th>
                            <th>استعادة</th>
                        @endif

                        <th>حذف</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($slides as $slide)
                        <tr>
                            <td>{{ $slide->name }}</td>
                            <td>{!! Names($slide->categories,'Category') !!}</td>
{{--                            <td>{{   getCategoryName($slide->parent)}}</td>--}}
                            @if($deleted==false)
                                {{--                        <td><img width="100px" src="{{url($slide->logo)}}"> </td>--}}

                                <td>{{ $slide->status == '1' ? 'مفعل' : 'معطل' }}</td>

                                <td class="text-center">
                                    <a href="{{ route('admin.slides.showSlideImages', $slide->id) }}"
                                       class="btn btn-primary"><i
                                            class="fa fa-eye"></i></a>
                                </td>





                                <td class="text-center">
                                    <a href="{{ route('admin.slides.edit', $slide->id) }}"
                                       class="btn btn-primary"><i
                                            class="fa fa-pencil"></i></a>
                                </td>
                            @else
                                <th>{{getUserName( $slide->deleted_by )}}</th>
                                <td>{{ $slide->deleted_at }}</td>


                                <td class="text-center">
                                    <a href="{{  route('admin.slides.restore',encrypt( $slide->id)) }}"
                                       class="btn btn-primary"><i
                                            class="fa fa-arrow-up"></i></a>
                                </td>

                            @endif


                            <td class="text-center">
                                <a href="{{ ($deleted==false) ?route('admin.slides.delete',encrypt( $slide->id)) : route('admin.slides.forceDelete',encrypt( $slide->id)) }}"
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
                    <h1 class="m-0 text-dark">الاقسام الرئيسية</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">الاقسام</li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">البداية </a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
