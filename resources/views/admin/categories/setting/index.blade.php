@php $link = 'categories' @endphp
@extends('admin.layout')
@include('admin.helperFiles.js.dataTable_files')
@section('title') اعدادات الصفحات   @endsection
@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ route('admin.caregories_setting.create',$cat_id) }}" class="btn btn-primary"><i class="fa fa-plus"></i></a>

        @if(isset($cat_id) and $deleted==false)  <a   style="float: left" href="{{ route('admin.caregories_setting.showSettingDeleted', $cat_id) }}" class="btn btn-primary"><i class="fa fa-eye"> عرض المحذوفة </i></a>@endif
        @if(isset($cat_id) and $deleted==true)  <a   style="float: left" href="{{ route('admin.caregories_setting.showSetting', $cat_id) }}" class="btn btn-primary"><i class="fa fa-eye"> عرض الغير محذوفة </i></a>@endif

    </div>
    cat_id


    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <!-- /.card-header -->
            <div class="x_content">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>  العنوان </th>
                        <th>  اسم العرض </th>
                        <th> نوع المحتوى </th>
                        <th> المنشى </th>
                        <th> تاريخ الانشاء </th>
                        <th>  الترتيب </th>
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
                    @foreach($settings as $setting)
                        <tr>
                            <td>{{ $setting->name }}</td>
                            <td>{{ $setting->display_name }}</td>
                            <td>{{ $setting->content }}</td>
                            <td>{{ getUserName($setting->created_by) }}</td>
                            <td>{{ $setting->created_at }}</td>

                            <td>{{ $setting->sort }}</td>
                            @if($deleted==false)
                                <td>{{ $setting->status == '1' ? 'مفعل' : 'معطل' }}</td>

                                <td class="text-center">
                                    <a href="{{ route('admin.caregories_setting.edit', $setting->id) }}"
                                       class="btn btn-primary"><i
                                            class="fa fa-pencil"></i></a>
                                </td>
                            @else
                                <th>{{getUserName( $setting->deleted_by )}}</th>
                                <td>{{ $setting->deleted_at }}</td>


                                <td class="text-center">
                                    <a href="{{  route('admin.caregories_setting.restore',encrypt( $setting->id)) }}"
                                       class="btn btn-primary"><i
                                            class="fa fa-arrow-up"></i></a>
                                </td>

                            @endif


                            <td class="text-center">
                                <a href="{{ ($deleted==false) ?route('admin.caregories_setting.delete',encrypt( $setting->id)) : route('admin.news.forceDelete',encrypt( $setting->id)) }}"
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
                    <h1 class="m-0 text-dark"> اعدادات صفحة {{   getCategoryName($cat_id)}}    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"> اعدادات الصفحات  </li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">البداية </a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection




