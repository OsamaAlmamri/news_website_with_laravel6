@php $link = 'advertisments' @endphp
@extends('admin.layout')

@section('title') الاعلانات   @endsection
@include('admin.helperFiles.js.dataTable_files')
@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ route('admin.advertisments.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <!-- /.card-header -->
            <div class="x_content">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>

                        <th> العنوان</th>
                        <th> الشعار</th>

                        <th>المعلن</th>
                        <th>وقت اضافة الاعلان</th>
                        @if($deleted==false)
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
                    @foreach($advertisments as $advertisment)
                        <tr>
                            <td>{{ $advertisment->title }}</td>
                            <td><img src="{{isset($advertisment->image)? url($advertisment->image):null}} " alt="لايوجد"
                                     width="50px">
                            </td>

                            <td>{{ getUserName($advertisment->created_by) }}</td>
                            <td>{{ $advertisment->created_at }}</td>
                            @if($deleted==false)

                                <td class="text-center">
                                    <a href="{{ route('admin.advertisments.edit', $advertisment->id) }}"
                                       class="btn btn-primary"><i
                                            class="fa fa-pencil"></i></a>
                                </td>
                            @else
                                <th>{{getUserName( $advertisment->deleted_by )}}</th>
                                <td>{{ $advertisment->deleted_at }}</td>


                                <td class="text-center">
                                    <a href="{{  route('admin.advertisments.restore',encrypt( $advertisment->id)) }}"
                                       class="btn btn-primary"><i
                                            class="fa fa-arrow-up"></i></a>
                                </td>

                            @endif


                            <td class="text-center">
                                <a href="{{ ($deleted==false) ?route('admin.advertisments.delete',encrypt( $advertisment->id)) : route('admin.advertisments.forceDelete',encrypt( $advertisment->id)) }}"
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
                    <h1 class="m-0 text-dark"> الاعلانات </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">الاعلانات</li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">البداية </a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
