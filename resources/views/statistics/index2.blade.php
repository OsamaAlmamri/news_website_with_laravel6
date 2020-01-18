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
        <?php $statistic_row = 1000; ?>
        <div class="table-responsive">
            <table id="discount" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <td class="text-left"> نوع الاحصائية</td>
                    <td class="text-right"> الفئة</td>
                    <td class="text-right">نوع الفئة</td>
                    <td class="text-right">الجنس</td>
                    <td class="text-right">نوع الجامعة </td>
                    <TD> فلترة</TD>
                </tr>
                </thead>
                <tbody>


                </tbody>


                <tfoot>

                <tr id="discount-row">

                    <td class="text-right"><select id="statustics_type"
                                                   onchange="CategoryChanged($(this),)"
                                                   name="statustics[][type]" class="form-control">
                            <option value="الطلاب و الخريجيين"
                                    @if($type=='الطلاب و الخريجيين') selected @endif >الطلاب و
                                الخريجيين
                            </option>
                            <option value="هيئة التدريس" @if($type=='هيئة التدريس') selected @endif >هيئة
                                التدريس
                            </option>
                            <option value="الهيئة الادارية" @if($type=='الهيئة الادارية') selected @endif >
                                الهيئة الادارية
                            </option>
                        </select></td>
                    <td class="text-right"><select id="degree" name="statustics[][degree]"
                                                   class="form-control">
                            @if($type=='الطلاب و الخريجيين')
                                <option value="دبلوم" @if($degree=='دبلوم') selected @endif> دبلوم</option>
                                <option value="بيكلاريوس" @if($degree=='بيكلاريوس') selected @endif>
                                    بيكلاريوس
                                </option>
                                <option value="ماجستير" @if($degree=='ماجستير') selected @endif> ماجستير
                                </option>
                                <option value="دكتوراة" @if($degree=='دكتوراة') selected @endif> دكتوراة
                                </option>
                            @endif
                            @if($type=='هيئة التدريس')
                                <option value="معيد" @if($degree=='معيد') selected @endif> معيد</option>
                                <option value="ماجستير" @if($degree=='ماجستير') selected @endif> ماجستير
                                </option>
                                <option value="دكتوراة" @if($degree=='دكتوراة') selected @endif> دكتوراة
                                </option>
                            @endif
                            @if($type=='الهيئة الادارية')
                                <option value="اداري" @if($degree=='اداري') selected @endif> اداري</option>
                                <option value="عامل" @if($degree=='عامل') selected @endif> عامل</option>
                            @endif
                        </select></td>

                    <td class="text-right"><select id="status"
                                                   name="statustics[][status]"
                                                   class="form-control">
                            @if($type=='الطلاب و الخريجيين')
                                <option value="مستجدون" @if($status=='مستجدون') selected @endif> مستجدون
                                </option>
                                <option value="ملتحقون" @if($status=='ملتحقون') selected @endif>ملتحقون
                                </option>
                                <option value="خريجون" @if($status=='خريجون') selected @endif>خريجون</option>
                            @endif
                            @if($type=='هيئة التدريس' or $type=='الهيئة الادارية' )

                                <option value="متعاقد" @if($status=='متعاقد') selected @endif> متعاقد
                                </option>
                                <option value="ثابت" @if($status=='ثابت') selected @endif> ثابت</option>
                            @endif
                        </select></td>

                    <td class="text-right"><select id="gender" name="statustics[][gender]" class="form-control">
                            <option value="ذكور" @if($gender=='ذكور') selected @endif> ذكور</option>
                            <option value="اناث" @if($gender=='اناث') selected @endif>اناث</option>
                        </select></td>


                    <td class="text-right"><select id="uni_type" class="form-control">
                            <option value="حكومي" @if($uni_type=='حكومي') selected @endif> حكومي </option>
                            <option value="خاص" @if($uni_type=='ذكور') selected @endif> خاص </option>
                            <option value="الكل" @if($uni_type=='الكل') selected @endif>الكل  </option>
                        </select></td>

                    <td class="text-left">
                        <button type="button" onclick="filter()"
                                data-toggle="tooltip"
                                title="  "
                                class="btn btn-primary"><i class="fa fa-filter"></i></button>
                    </td>


                </tr>

                </tfoot>
            </table>
        </div>

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

        function CategoryChanged(e, id) {

            // $('input[name=\'option\']')
            //     html += '      <option value="student">الطلاب و الخريجيين </option>';
            // html += '      <option value="teacher">هيئة التدريس </option>';
            // html += '      <option value="management">الهيئة الادارية </option>';
            var html = '';
            var html2 = '';
            if (e.val() == 'الطلاب و الخريجيين') {
                html = '      <option value="دبلوم">  دبلوم </option>';
                html += '      <option value="بيكلاريوس"> بيكلاريوس  </option>';
                html += '      <option value="ماجستير"> ماجستير  </option>';
                html += '      <option value="دكتوراة"> دكتوراة  </option>';

                html2 += '      <option value="مستجدون">  مستجدون</option>';

                html2 += '      <option value="خريجون">خريجون  </option>';
            } else if (e.val() == 'هيئة التدريس') {

                html += '      <option value="معيد"> معيد  </option>';
                html += '      <option value="ماجستير"> ماجستير  </option>';
                html += '      <option value="دكتوراة"> دكتوراة  </option>';

                html2 = '      <option value="متعاقد">  متعاقد </option>';
                html2 += '      <option value="ثابت"> ثابت  </option>';
            } else if (e.val() == 'الهيئة الادارية') {

                html += '      <option value="اداري"> اداري  </option>';
                html += '      <option value="عامل"> عامل  </option>';


                html2 = '      <option value="متعاقد">  متعاقد </option>';
                html2 += '      <option value="ثابت"> ثابت  </option>';


            }

            $("#degree").html(html);
            $("#status").html(html2);

        }


        function filter() {

            var gender = $("#gender").val();
            var type = $("#statustics_type").val();
            var status = $("#status").val();
            var degree = $("#degree").val();
            var uni_type = $("#uni_type").val();

            location.replace("{{ url('') }}"+"/admin/statistics/showStatisticsTableForAllUniversity/"+uni_type+'/'+type+'/'+status+'/'+degree+'/'+gender);

        }

        $(function () {
            // $("#example1").DataTable();

            $('#example1').DataTable({
                keys: true,
                lengthChange: false,
                language: {url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Arabic.json"},
                dom: "Bfrtip",
                buttons: [
                    {extend: "copy", text: "نسخ", className: "btn-sm"}, {
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
