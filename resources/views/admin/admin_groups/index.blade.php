@php $link = 'admin_groups' @endphp
@extends('admin.layout')

@section('title') مجموعات المدراء  @endsection

@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ route('admin.admin_groups.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
    </div>
    <div class="card mt-2">
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>الاسم</th>
                    <th>تحرير</th>
                </tr>
                </thead>
                <tbody>
                @foreach($groups as $group)
                    <tr>
                        <td>{{ $group->name }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.admin_groups.edit', $group->id) }}" class="btn btn-primary"><i class="fa fa-pencil-alt"></i></a>
                            <a href="{{ route('admin.admin_groups.delete', $group->id) }}" onclick="return confirm('هل أنت متأكد من الحذف');" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
                    <h1 class="m-0 text-dark">مجموعات المدراء</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">مجموعات المدراء</li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.admin_groups.index') }}">البداية </a></li>
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

