@php $link = 'admins' @endphp
@extends('admin.layout')

@section('title') المدراء @endsection

@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ route('admin.admins.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
    </div>
    @if(session()->has('admins.add'))
        <div class="alert alert-success alert-dismissible text-center btn-block mt-2">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-check mr-2"></i>      تمت إضافة {{ session()->get('admins.add') }} بنجاح
        </div>
    @endif
    <div class="card mt-2">
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>الاسم</th>
                    <th>البريد الالكتروني</th>
                    <th>مجموعة العميل</th>
                    <th>الحالة</th>
                    <th>تاريخ الاضافة</th>
                    <th>إجراءات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($admins as $admin)
                    <tr>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>{{ $admin->admin_group->name }}</td>
                        <td>{{ $admin->status  ? 'تمكين' : 'تعطيل' }}</td>
                        <td>{{ $admin->created_at->format('d/m/Y') }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.admins.edit', $admin->id) }}" class="btn btn-primary"><i class="fa fa-pencil-alt"></i></a>
                            <a href="{{ route('admin.admins.delete', $admin->id) }}"  onclick="return confirm('هل أنت متأكد من الحذف');" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
                    <h1 class="m-0 text-dark">المدراء</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">المدراء</li>
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
