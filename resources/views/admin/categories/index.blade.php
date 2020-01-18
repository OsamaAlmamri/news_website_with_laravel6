@php $link = 'categories' @endphp
@extends('admin.layout')

@section('title') الاقسام  @endsection
@include('admin.helperFiles.js.dataTable_files')

@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <!-- /.card-header -->
            <div class="x_content">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>الاسم العربي</th>
                        <th>الاسم االانجليزي</th>
                        <th>القسم الرئيسي</th>
                        @if($deleted==false)
                            <th>عدد الاقسام</th>
                            <th> القائمة الرئيسية</th>
                            <th>تعرض سلايدات</th>
                            <th>الترتيب</th>
                            <th>الحالة</th>
                            <th>عرض</th>
                            <th>الاعلانات</th>
                            <th>التصويتات</th>
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
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->name_ar }}</td>
                            <td>{{ $category->name_en }}</td>
                            <td>{{   getCategoryName($category->parent)}}</td>
                            @if($deleted==false)
                                <td>{{ $category->section_count }}</td>
                                {{--                        <td><img width="100px" src="{{url($category->logo)}}"> </td>--}}
                                <td>{{ $category->isMain == '1' ? 'نعم' : 'لا' }}</td>
                                <td>{{ $category->hasSlides == '1' ? 'نعم' : 'لا' }}</td>
                                <td>{{ $category->sort }}</td>
                                <td>{{ $category->status == '1' ? 'مفعل' : 'معطل' }}</td>

                                <td class="text-center">
                                    <a href="{{ route('admin.caregories_setting.showSetting', $category->id) }}"
                                       class="btn btn-primary"><i
                                            class="fa fa-eye"></i></a>
                                </td>


                                <td class="text-center">
                                    <a href="{{ route('admin.categories_advertisment.showAdvertisment',['id'=>$category->id,'type'=>'active']) }}"
                                       class="btn btn-primary"><i
                                            class="fa fa-eye"></i></a>
                                </td>


                                <td class="text-center">
                                    <a href="{{ route('admin.categories_voit.showVoit',['id'=>$category->id,'type'=>'active']) }}"
                                       class="btn btn-primary"><i
                                            class="fa fa-eye"></i></a>
                                </td>


                                <td class="text-center">
                                    <a href="{{ route('admin.categories.edit', $category->id) }}"
                                       class="btn btn-primary"><i
                                            class="fa fa-pencil"></i></a>
                                </td>
                            @else
                                <th>{{getUserName( $category->deleted_by )}}</th>
                                <td>{{ $category->deleted_at }}</td>


                                <td class="text-center">
                                    <a href="{{  route('admin.categories.restore',encrypt( $category->id)) }}"
                                       class="btn btn-primary"><i
                                            class="fa fa-arrow-up"></i></a>
                                </td>

                            @endif


                            <td class="text-center">
                                <a href="{{ ($deleted==false) ?route('admin.categories.delete',encrypt( $category->id)) : route('admin.categories.forceDelete',encrypt( $category->id)) }}"
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
