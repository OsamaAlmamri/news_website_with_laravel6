@php $link = 'statistics' @endphp
@extends('admin.layout')

@section('title') الاحصائيات  @endsection
@section('style')
    <link href="{{url('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">

@endsection


@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ route('admin.statistics.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
      @if(isset($university_id))  <a   style="float: left" href="{{ route('admin.statistics.showStatisticsChar',[$university_id,$type,'default']) }}" class="btn btn-primary"><i class="fa fa-eye"> عرض الاحصائيات </i></a>@endif
      @if(isset($type))  <a   style="float: left" href="{{ route('admin.statistics.showStatisticsCharForAllUniversity',['ذكور',$type,'default']) }}" class="btn btn-primary"><i class="fa fa-eye"> عرض  الاحصائيات  لكل الجامعات</i></a>@endif

    </div>

    <div  class="d-flex justify-content-start">
    </div>

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <!-- /.card-header -->
            <div class="x_content">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>الجامعة</th>
                        <td> نوع الاحصائية</td>
                        <td>الفئة</td>
                        <td>نوع الفئة</td>
                        <td>السنة</td>
                        <td>الجنس</td>
                        <td>العدد</td>

                        <th>تعديل</th>
                        <th>حذف</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($statistics as $statistic)
                        <tr>

                            <td>{{ $statistic->university->name }} </td>
                            <td>{{ $statistic->type }} </td>
                            <td>{{ $statistic->degree }} </td>
                            <td>{{ $statistic->status }} </td>
                            <td>{{ $statistic->year }} </td>
                            <td>{{ $statistic->gender }} </td>
                            <td>{{ $statistic->number }} </td>



                            <td class="text-center">
                                <a href="{{ route('admin.statistics.edit', $statistic->id) }}"
                                   class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.statistics.delete',encrypt( $statistic->id)) }}"
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
                    <h1 class="m-0 text-dark">الاحصائيات</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">الاحصائيات</li>
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
            // $("#example1").DataTable();

            $('#example1').DataTable({
                language: {url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Arabic.json"},
                dom: "Bfrtip",
                buttons: [{extend: "copy", text: "نسخ", className: "btn-sm"}, {
                    extend: "csv",
                    text: "ملف CSV",
                    className: "btn-sm"
                }, {extend: "excel", text: "اکسل", className: "btn-sm"}, {
                    extend: "pdfHtml5",
                    text: "ملف PDF",
                    className: "btn-sm"
                }, {extend: "print", text: "طباعة", className: "btn-sm"}],
                responsive: !0
            });
        });
    </script>
@endsection

@section('scripts')

    <script src="{{url('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{url('vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
    <script src="{{url('vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{url('vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{url('vendors/pdfmake/build/vfs_fonts.js')}}"></script>
@endsection
