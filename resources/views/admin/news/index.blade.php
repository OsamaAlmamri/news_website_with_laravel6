@php $link = 'news' @endphp
@extends('admin.layout')
@include('admin.helperFiles.js.dataTable_files')
@section('title') الاخبار   @endsection
@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ route('admin.news.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <!-- /.card-header -->
            <div class="x_content">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>

                        <th> العنوان  </th>
                        <th> الشعار</th>
                        <th> التصنيف</th>
                        <th> التعليقات </th>
                        <th>الناشر</th>
                        <th>وقت النشر</th>
                        @if($deleted==false)

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
                    @foreach($allNews as $news)
                        <tr>
                            <td>{{ $news->title }}</td>
                            <td> <img src="{{isset($news->logo)? url($news->logo):null}} "  alt="لايوجد" width="50px"></td>
                            <td>{!! Names($news->categories,'Category') !!}</td>
                            <td>{{   $news->has_comment == 1 ? 'مفعل' : 'غير مفعل'}}</td>
                            <td>{{ getUserName($news->created_by) }}</td>
                            <td>{{ $news->created_at }}</td>
                            @if($deleted==false)
                                <td>{{ $news->status == '1' ? 'مفعل' : 'معطل' }}</td>

                                <td class="text-center">
                                    <a href="{{ route('admin.news.edit', $news->id) }}"
                                       class="btn btn-primary"><i
                                            class="fa fa-pencil"></i></a>
                                </td>
                            @else
                                <th>{{getUserName( $news->deleted_by )}}</th>
                                <td>{{ $news->deleted_at }}</td>


                                <td class="text-center">
                                    <a href="{{  route('admin.news.restore',encrypt( $news->id)) }}"
                                       class="btn btn-primary"><i
                                            class="fa fa-arrow-up"></i></a>
                                </td>

                            @endif


                            <td class="text-center">
                                <a href="{{ ($deleted==false) ?route('admin.news.delete',encrypt( $news->id)) : route('admin.news.forceDelete',encrypt( $news->id)) }}"
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
                    <h1 class="m-0 text-dark"> الاخبار </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">الاخبار </li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">البداية </a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection




