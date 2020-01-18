@php $link = 'categories' @endphp
@extends('admin.layout')
@include('admin.helperFiles.js.dataTable_files')
@section('title') اعلانات الصفحات   @endsection
@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ route('admin.categories_advertisment.create',$cat_id) }}" class="btn btn-primary"><i
                class="fa fa-plus"></i></a>

        @if(isset($cat_id) and $deleted==true)  <a style="float: left"
                                                   href="{{ route('admin.categories_advertisment.showAdvertisment', ['id'=>$cat_id,'type'=>'active']) }}"
                                                   class="btn btn-primary"><i class="fa fa-eye"> عرض الغير

                محذوفة </i></a>@endif
        @if(isset($cat_id) and $deleted==false)  <a style="float: left"
                                                    href="{{ route('admin.categories_advertisment.showAdvertisment', ['id'=>$cat_id,'type'=>'deleted']) }}"
                                                    class="btn btn-primary"><i class="fa fa-eye"> عرض
                المحذوفة </i></a>@endif

        <a style="float: left"
           href="{{ route('admin.categories_advertisment.showAdvertisment', ['id'=>$cat_id,'type'=>'timeOutAndDeleted']) }}"
           class="btn btn-primary"><i class="fa fa-eye"> عرض الاعلانات المحذوفة غير المنتهة </i></a>

        <a style="float: left"
           href="{{ route('admin.categories_advertisment.showAdvertisment', ['id'=>$cat_id,'type'=>'timeOut']) }}"
           class="btn btn-primary"><i class="fa fa-eye"> عرض الاعلانات المنهية </i></a>

        <a style="float: left"
           href="{{ route('admin.categories_advertisment.showAdvertisment', ['id'=>$cat_id,'type'=>'active']) }}"
           class="btn btn-primary"><i class="fa fa-eye"> عرض الفعالة </i></a>

    </div>



    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <!-- /.card-header -->
            <div class="x_content">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>

                        <th> الاعلان</th>
                        <th> القسم</th>
                        <th> الوقت</th>
                        <th> الجهة</th>
                        <th> الوقت المنقضي</th>
                        <th> الترتيب</th>
                        <th> الوقت المتبقي</th>
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
                    @foreach($cat_advertisments as $advertisment)
                        <tr>
                            <td>{{ $advertisment->advertisment->title }}</td>
                            <td>{{ $advertisment->category_value->name }}</td>

                            <td>{{ $advertisment->time }} دقيقة</td>
                            <td>{{ $advertisment->category_value->padding }}</td>
                            <td>{{ diffTime(now(), $advertisment->created_at) }} دقيقة</td>

                            <td>{{ $advertisment->sort }}</td>
                            <td>{{$advertisment->time - diffTime(time(), $advertisment->created_at) }} دقيقة</td>
                            <td>{{ getUserName($advertisment->created_by) }}</td>
                            <td>{{ $advertisment->created_at }}</td>
                            <td>{{   now()}}</td>

                            @if($deleted==false)
                                <td>{{ $advertisment->status == '1' ? 'مفعل' : 'معطل' }}</td>

                                <td class="text-center">
                                    <a href="{{ route('admin.categories_advertisment.edit', $advertisment->id) }}"
                                       class="btn btn-primary"><i
                                            class="fa fa-pencil"></i></a>
                                </td>
                            @else
                                <th>{{getUserName( $advertisment->deleted_by )}}</th>
                                <td>{{ $advertisment->deleted_at }}</td>


                                <td class="text-center">
                                    <a href="{{  route('admin.categories_advertisment.restore',encrypt( $advertisment->id)) }}"
                                       class="btn btn-primary"><i
                                            class="fa fa-arrow-up"></i></a>
                                </td>

                            @endif


                            <td class="text-center">
                                <a href="{{ ($deleted==false) ?route('admin.categories_advertisment.delete',encrypt( $advertisment->id)) : route('admin.news.forceDelete',encrypt( $advertisment->id)) }}"
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
                    <h1 class="m-0 text-dark"> اعلانات صفحة {{   getCategoryName($cat_id)}}    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"> اعلانات الصفحات</li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">البداية </a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection




