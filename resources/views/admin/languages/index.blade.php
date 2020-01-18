@php $link = 'languages' @endphp
@extends('admin.layout')

@section('title') اللغات  @endsection

@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ route('admin.languages.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
    </div>
    <div class="card mt-2">
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>الاسم</th>
                    <th>الرمز</th>
                    <th>ترتيب الفرز</th>
                    <th>تحرير</th>
                </tr>
                </thead>
                <tbody>
                @foreach($languages as $language)
                    <tr>
                        <td>{{ $language->name }}</td>
                        <td>{{ $language->symbol }}</td>
                        <td>{{ $language->sort }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.languages.edit', $language->id) }}" class="btn btn-primary"><i class="fa fa-pencil-alt"></i></a>
                            <i href="{{ route('admin.languages.delete', $language->id) }}"  onclick="return confirm('هل أنت متأكد من الحذف');" class="btn btn-danger"><i class="fa fa-trash"></i></i>
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
                    <h1 class="m-0 text-dark">اللغات</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">اللغات</li>
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
