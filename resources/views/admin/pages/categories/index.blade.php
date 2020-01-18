@php $link = '' @endphp
@extends('admin.layout')

@section('title', 'صفحات الأقسام')

@section('content')
    <div class="d-flex justify-content-end">
    </div>
    <div class="card mt-2">
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>الاسم</th>
                    <th>الحالة</th>
                    <th>تحرير</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pages as $page)
                    <tr>
                        <td>{{ $page->category->name }}</td>
                        <td>{{ $page->status ? 'تمكين' : 'تعطيل' }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.pages.categories.preview', $page->id) }}" target="_blank" class="btn btn-info" ><i class="fa fa-eye" ></i></a>
                            <a href="{{ route('admin.pages.categories.edit', $page->id) }}" class="btn btn-primary"><i class="fa fa-pencil-alt"></i></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection

@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">صفحات الأقسام</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">صفحات الأقسام</li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">البداية </a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('js')
    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });
    </script>
@endsection

@section('scripts')
    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
@endsection
