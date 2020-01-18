@php $link = 'categories' @endphp
@extends('admin.layout')
@include('admin.helperFiles.js.dataTable_files')
@section('title') تصويتات الصفحات   @endsection
@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ route('admin.categories_voit.createCat',['id'=>$cat_id]) }}" class="btn btn-primary"><i
                class="fa fa-plus"></i></a>

        @if(isset($cat_id) and $deleted==true)  <a style="float: left"
                                                   href="{{ route('admin.categories_voit.showVoit', ['id'=>$cat_id,'type'=>'active']) }}"
                                                   class="btn btn-primary"><i class="fa fa-eye"> عرض الغير

                محذوفة </i></a>@endif
        @if(isset($cat_id) and $deleted==false)  <a style="float: left"
                                                    href="{{ route('admin.categories_voit.showVoit', ['id'=>$cat_id,'type'=>'deleted']) }}"
                                                    class="btn btn-primary"><i class="fa fa-eye"> عرض
                المحذوفة </i></a>@endif

        <a style="float: left"
           href="{{ route('admin.categories_voit.showVoit', ['id'=>$cat_id,'type'=>'timeOutAndDeleted']) }}"
           class="btn btn-primary"><i class="fa fa-eye"> عرض التصويتات المحذوفة غير المنتهة </i></a>

        <a style="float: left"
           href="{{ route('admin.categories_voit.showVoit', ['id'=>$cat_id,'type'=>'timeOut']) }}"
           class="btn btn-primary"><i class="fa fa-eye"> عرض التصويتات المنهية </i></a>

        <a style="float: left"
           href="{{ route('admin.categories_voit.showVoit', ['id'=>$cat_id,'type'=>'active']) }}"
           class="btn btn-primary"><i class="fa fa-eye"> عرض الفعالة </i></a>

    </div>



    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <!-- /.card-header -->
            <div class="x_content">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>

                        <th> التصويت</th>
                        <th> القسم</th>

                        <th> المنشى</th>
                        <th> تاريخ الانشاء</th>

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
                    @foreach($cat_voites as $cat_voit)
                        <tr>
                            <td>{{ $cat_voit->voit->title }}</td>
                            <td>{{ $cat_voit->category_value->name }}</td>

                            <td>{{ getUserName($cat_voit->created_by) }}</td>
                            <td>{{ $cat_voit->created_at }}</td>


                            @if($deleted==false)
                                <td>{{ $cat_voit->status == '1' ? 'مفعل' : 'معطل' }}</td>

                                <td class="text-center">
                                    <a href="{{ route('admin.categories_voit.edit', $cat_voit->id) }}"
                                       class="btn btn-primary"><i
                                            class="fa fa-pencil"></i></a>
                                </td>
                            @else
                                <th>{{getUserName( $cat_voit->deleted_by )}}</th>
                                <td>{{ $cat_voit->deleted_at }}</td>


                                <td class="text-center">
                                    <a href="{{  route('admin.categories_voit.restore',encrypt( $cat_voit->id)) }}"
                                       class="btn btn-primary"><i
                                            class="fa fa-arrow-up"></i></a>
                                </td>

                            @endif


                            <td class="text-center">
                                <a href="{{ ($deleted==false) ?route('admin.categories_voit.delete',encrypt( $cat_voit->id)) : route('admin.news.forceDelete',encrypt( $cat_voit->id)) }}"
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
                    <h1 class="m-0 text-dark"> تصويتات صفحة {{   getCategoryName($cat_id)}}    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"> تصويتات الصفحات</li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">البداية </a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection




