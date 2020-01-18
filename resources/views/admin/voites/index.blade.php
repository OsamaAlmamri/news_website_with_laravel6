@php $link = 'voites' @endphp
@extends('admin.layout')

@section('title') التصويتات   @endsection


@section('style')
    <link href="{{url('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">

    <!-- ECharts -->
    <script src="{{ url('vendors/echarts/dist/echarts.min.js')}}"></script>
    <script src="{{ url('vendors/echarts/map/js/world.js')}}"></script>


@endsection
@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ route('admin.voites.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <!-- /.card-header -->
            <div class="x_content">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>

                        <th> العنوان</th>
                        <th> الخيارات</th>
                        <th> الصورة</th>

                        <th>المنشى</th>
                        <th>وقت اضافة التصويت</th>
                        <th> مدة التصويت</th>
                        <th> الوقت المنقضي</th>
                        <th> المتبقي</th>
                        <th>عدد المصوتون</th>

                        @if($deleted==false)
                            <th> الحالة</th>
                            <th> عرض النتائج</th>
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
                    @foreach($voites as $voit)
                        <tr>
                            <td>{{ $voit->title }}</td>
                            <td>{!! Names($voit->voit_values,'Voit') !!}</td>
                            <td><img src="{{isset($voit->image)? url($voit->image):null}} " alt="لايوجد"
                                     width="50px">
                            </td>

                            <td>{{ getUserName($voit->created_by) }}</td>
                            <td>{{ $voit->created_at }}</td>


                            <td>{{ $voit->time }}</td>
                            <td>{{ diffTime(now(), $voit->created_at) }} دقيقة</td>
                            <td>{{$voit->time - diffTime(time(), $voit->created_at) }} دقيقة</td>
                            <td> {{$voit->voit_results->count()}}</td>
                            @if($deleted==false)
                                <td>{{ $voit->status == '1' ? 'مفعل' : 'معطل' }}</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-primary" onclick="showResult({{$voit->id}})">عرض  النتائج
                                    </button>

                                </td>
                                <td class="text-center">
                                    <a href="{{ route('admin.voites.edit', $voit->id) }}"
                                       class="btn btn-primary"><i
                                            class="fa fa-pencil"></i></a>
                                </td>
                            @else
                                <th>{{getUserName( $voit->deleted_by )}}</th>
                                <td>{{ $voit->deleted_at }}</td>


                                <td class="text-center">
                                    <a href="{{  route('admin.voites.restore',encrypt( $voit->id)) }}"
                                       class="btn btn-primary"><i
                                            class="fa fa-arrow-up"></i></a>
                                </td>

                            @endif


                            <td class="text-center">
                                <a href="{{ ($deleted==false) ?route('admin.voites.delete',encrypt( $voit->id)) : route('admin.voites.forceDelete',encrypt( $voit->id)) }}"
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
                    <h1 class="m-0 text-dark"> التصويتات </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">التصويتات</li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">البداية </a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div id="echart_pie5" style="height:350px;"></div>

    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel"> نتائج التصويتات </h4>
                </div>
                <div class="modal-body">
                    <h4 id="resultVoitTittle"></h4>
                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <div class="x_content">

                            {{--                            <div id="echart_pie3" style="height:350px;"></div>--}}


                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">رجوع</button>
                    <button type="button" class="btn btn-primary"> تحديث</button>
                </div>

            </div>
        </div>
    </div>

@endsection


@section('js')

    <script>
        function fetchResult(voit_id) {
            $.ajax({
                url: '{{route('admin.voites.fetchVoitResult')}}',
                dataType: 'json',
                method: 'post',
                data: '_token=' + encodeURIComponent("{{csrf_token()}}") +
                    '&voit_id=' + encodeURIComponent(voit_id),
                success: function (json) {
                    console.log(json[0].data);

                    test(json[0].options, json[0].number);
                    // test2(json[0].university, json[0].data);
                }, error: function (err) {
                    console.log(err);
                }
            });
        }


        function test(xAxis, number) {

            if ($('#echart_pie5').length) {
                var echartPie = echarts.init(document.getElementById('echart_pie5'), null);
                echartPie.setOption({
                    color: ['#003366', '#e5323e'],
                    tooltip: {
                        trigger: 'axis',
                        axisPointer: {
                            type: 'shadow'
                        }
                    },
                    legend: {
                        data: ['number']
                    },
                    toolbox: {
                        show: true,
                        orient: 'vertical',
                        left: 'right',
                        top: 'center',
                        feature: {
                            mark: {show: true},
                            dataView: {show: true, readOnly: false},
                            magicType: {show: true, type: ['line', 'bar', 'stack', 'tiled']},
                            restore: {show: true},
                            saveAsImage: {show: true}
                        }
                    },
                    calculable: true,
                    xAxis: [
                        {
                            type: 'category',
                            axisTick: {show: false},
                            data: xAxis,
                            min: 'dataMin',
                            max: 'dataMax'
                        }
                    ],
                    yAxis: [
                        {
                            type: 'value'
                        }
                    ],
                    series: [
                        {
                            name: 'number',
                            type: 'bar',
                            barGap: 0,
                            label: labelOption,
                            data: number
                        }

                    ]
                });


            }
        }

    </script>
    <script>


        function showResult(id) {

            // $("#myModal").modal();
            fetchResult(id);
        }

        $(function () {
            // $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
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



    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ url('Echarts/esl.js') }}"></script>
    <script src="{{ url('Echarts/testHelper.js') }}"></script>
@endsection

@section('char_js')

    <script>

        function filter() {

            var gender = $("#gender").val();
            var type = $("#statustics_type").val();
            var status = $("#status").val();
            var degree = $("#degree").val();
            var uni_type = $("#uni_type").val();

            fetchChar(degree, gender, type, status, uni_type);

        }

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

    </script>

    <script>
        var labelOption = {
            normal: {
                show: true,
                position: 'insideBottom',
                rotate: 90,
                textStyle: {
                    align: 'left',
                    verticalAlign: 'middle'
                }
            }
        };
        var echartPie = echarts.init(document.getElementById('main'), null);

        echartPie.setOption({
            color: ['#003366', '#006699', '#4cabce', '#e5323e'],
            tooltip: {
                trigger: 'axis',
                axisPointer: {            // 坐标轴指示器，坐标轴触发有效
                    type: 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
                }
            },
            legend: {
                data: ['A', 'B', 'C', 'D']
            },
            toolbox: {
                show: true,
                orient: 'vertical',
                left: 'right',
                top: 'center',
                feature: {
                    mark: {show: true},
                    dataView: {show: true, readOnly: false},
                    magicType: {show: true, type: ['line', 'bar', 'stack', 'tiled']},
                    restore: {show: true},
                    saveAsImage: {show: true}
                }
            },
            calculable: true,
            xAxis: [
                {
                    type: 'category',
                    axisTick: {show: false},
                    data: ['2012', '2013', '2014', '2015', '2016']
                }
            ],
            yAxis: [
                {
                    type: 'value'
                }
            ],
            series: [
                {
                    name: 'A',
                    type: 'bar',
                    barGap: 0,
                    label: labelOption,
                    data: [320, 332, 301, 334, 390]
                },
                {
                    name: 'B',
                    type: 'bar',
                    label: labelOption,
                    data: [220, 182, 191, 234, 290]
                },
                {
                    name: 'C',
                    type: 'bar',
                    label: labelOption,
                    data: [150, 232, 201, 154, 190]
                },
                {
                    name: 'D',
                    type: 'bar',
                    label: labelOption,
                    data: [98, 77, 101, 99, 30]
                }
            ]
        });

    </script>

    <script>
        function fetchChar(degree, gender, type, status, uni_type) {
            $.ajax({
                url: '{{route('admin.statistics.fetchStatisticsCharForAllUniversity')}}',
                dataType: 'json',
                method: 'post',
                data: '_token=' + encodeURIComponent("{{csrf_token()}}") +
                    '&gender=' + encodeURIComponent(gender) +
                    '&degree=' + encodeURIComponent(degree) +
                    '&uni_type=' + encodeURIComponent(uni_type) +
                    '&type=' + encodeURIComponent(type) + '&status=' + encodeURIComponent(status),
                success: function (json) {
                    console.log(json[0].data);

                    test(json[0].university, json[0].number);
                    // test2(json[0].university, json[0].data);
                }, error: function (err) {
                    console.log(err);
                }
            });


        }


        function test(xAxis, number) {

            if ($('#echart_pie3').length) {

                var echartPie = echarts.init(document.getElementById('echart_pie3'), null);

                echartPie.setOption({
                    color: ['#003366', '#e5323e'],
                    tooltip: {
                        trigger: 'axis',
                        axisPointer: {
                            type: 'shadow'
                        }
                    },
                    legend: {
                        data: ['number']
                    },
                    toolbox: {
                        show: true,
                        orient: 'vertical',
                        left: 'right',
                        top: 'center',
                        feature: {
                            mark: {show: true},
                            dataView: {show: true, readOnly: false},
                            magicType: {show: true, type: ['line', 'bar', 'stack', 'tiled']},
                            restore: {show: true},
                            saveAsImage: {show: true}
                        }
                    },
                    calculable: true,
                    xAxis: [
                        {
                            type: 'category',
                            axisTick: {show: false},
                            data: xAxis,
                            min: 'dataMin',
                            max: 'dataMax'
                        }
                    ],
                    yAxis: [
                        {
                            type: 'value'
                        }
                    ],
                    series: [
                        {
                            name: 'number',
                            type: 'bar',
                            barGap: 0,
                            label: labelOption,
                            data: number
                        }

                    ]
                });


            }
        }

        function test2(xAxis, data) {

            if ($('#echart_pie3').length) {

                var echartPie = echarts.init(document.getElementById('echart_pie3'), null);
                echartPie.setOption({
                    tooltip: {
                        trigger: 'item'
                    },
                    legend: {
                        data: xAxis,
                        top: 0,
                        left: 'center'
                    }, toolbox: {
                        show: true,
                        orient: 'vertical',
                        left: 'right',
                        top: 'center',
                        feature: {
                            mark: {show: true},
                            dataView: {show: true, readOnly: false},
                            magicType: {show: true, type: ['line', 'bar', 'stack', 'tiled']},
                            restore: {show: true},
                            saveAsImage: {show: true}
                        }
                    },
                    xAxis: [
                        {
                            type: 'category',
                            data: [0],
                            axisTick: {show: false},
                            axisLabel: {show: false}

                        },
                    ],
                    yAxis: [
                        {
                            type: 'value'
                        }
                    ],

                    series: echarts.util.map(data, function (item) {
                        return {
                            name: item.name,
                            type: 'bar',
                            label: {
                                normal: {
                                    show: true,
                                    position: 'inside',
                                    formatter: function (param) {
                                        console.log(param);
                                        return (param.seriesName + '\n' + param.value);
                                    }
                                }
                            },
                            // label: labelOption,
                            data: [item.value]
                        }
                    }).concat([{
                        type: 'custom',
                        renderItem: renderProvinceName,
                        data: data
                    }])
                });


            }
        }

        fetchChar('ماجستير', 'ذكور', 'الطلاب و الخريجيين', 'مستجدون', 'خاص');
    </script>

    <script>


    </script>

    <script>


        function renderProvinceName(param, api) {

            var currentSeriesIndices = api.currentSeriesIndices();
            currentSeriesIndices.pop(); // remove custom series;

            var barLayout = api.barLayout({
                barGap: '30%', barCategoryGap: '20%', count: currentSeriesIndices.length
            });

            var nameTexts = echarts.util.map(currentSeriesIndices, function (serIdx, index, m) {


                var point = api.coord([0, 0]);
                point[0] += barLayout[index].offsetCenter;
                point[1] = api.getHeight() - 20;

                return {
                    position: point,
                    name: serIdx,
                    type: 'circle',
                    shape: {
                        cx: 0, cy: 0, r: 10
                    },
                    style: {
                        text: serIdx,
                        fill: '#333',
                        textFill: '#eee',
                        stroke: null
                    }
                };
            });

            return {
                type: 'group',
                $mergeChildren: 'byName',
                children: nameTexts
            };
        }

        //
        // testHelper.createChart(echarts, 'diff-children-by-name', option);
        //
        var echartPie2 = echarts.init(document.getElementById('diff-children-by-name'), null);


        echartPie2.setOption({
            tooltip: {
                trigger: 'item'
            },
            legend: {
                data: ['广州', '深圳', '珠海', '佛山', '杭州', '舟山', '宁波', '广州', '深圳', '珠海', '佛山', '杭州', '舟山', '宁波', '广州', '深圳', '珠海', '佛山', '杭州', '舟山', '宁波', '广州', '深圳', '珠海', '佛山', '杭州', '舟山', '宁波',
                    '广州', '深圳', '珠海', '佛山', '杭州', '舟山', '宁波', '广州', '深圳', '珠海', '佛山', '杭州', '舟山', '宁波', '广州', '深圳', '珠海', '佛山', '杭州', '舟山', '宁波', '广州', '深圳', '珠海', '佛山', '杭州', '舟山', '宁波'],
                top: 0,
                left: 'center'
            },
            xAxis: [
                {
                    type: 'category',
                    data: [0],
                    axisTick: {show: false},
                    axisLabel: {show: false}
                },
            ],
            yAxis: [
                {
                    type: 'value'
                }
            ],
            series: echarts.util.map(data, function (item) {
                return {
                    name: item.name,
                    type: 'bar',
                    label: {
                        normal: {
                            show: true,
                            position: 'bottom',
                            formatter: function (param) {
                                return param.seriesName;
                            }
                        }
                    },
                    data: [item.value]
                }
            }).concat([{
                type: 'custom',
                renderItem: renderProvinceName,
                data: [0]
            }])
        });
    </script>

@endsection
