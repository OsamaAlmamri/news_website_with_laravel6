@php $link = 'statistic_1' @endphp
@extends('../admin.layout')

@section('title') المدراء @endsection


@section('style')
    <style>  .chart {
            height: 500px;
        }
    </style> @endsection


@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ route('admin.statistics.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
        {{--        <a   style="float: left" href="{{ route('admin.statistics.showStatisticsChar',[]) }}" class="btn btn-primary"><i class="fa fa-eye"> عرض الاحصائيات </i></a>--}}

    </div>


    <!-- page content -->

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Echarts
                    <small> بعض النماذج الاحصائية </small>
                </h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="اكتب هنا للبحث ...">
                        <span class="input-group-btn">
                      <button class="btn btn-default" type="button">بحث </button>
                    </span>
                    </div>
                </div>
            </div>
        </div>

        <?php $statistic_row = 1000; ?>

        <div class="table-responsive">
            <table id="discount" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <td class="text-left"> نوع الاحصائية</td>
                    <td class="text-right"> الفئة</td>
                    <td class="text-right">نوع الفئة</td>
                    <td class="text-right">الجنس</td>
                    <td class="text-right">نوع الجامعة</td>
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
                                    @if($statistic->type=='الطلاب و الخريجيين') selected @endif >الطلاب و
                                الخريجيين
                            </option>
                            <option value="هيئة التدريس" @if($statistic->type=='هيئة التدريس') selected @endif >هيئة
                                التدريس
                            </option>
                            <option value="الهيئة الادارية" @if($statistic->type=='الهيئة الادارية') selected @endif >
                                الهيئة الادارية
                            </option>
                        </select></td>
                    <td class="text-right"><select id="degree" name="statustics[][degree]"
                                                   class="form-control">
                            @if($statistic->type=='الطلاب و الخريجيين')
                                <option value="دبلوم" @if($statistic->degree=='دبلوم') selected @endif> دبلوم</option>
                                <option value="بيكلاريوس" @if($statistic->degree=='بيكلاريوس') selected @endif>
                                    بيكلاريوس
                                </option>
                                <option value="ماجستير" @if($statistic->degree=='ماجستير') selected @endif> ماجستير
                                </option>
                                <option value="دكتوراة" @if($statistic->degree=='دكتوراة') selected @endif> دكتوراة
                                </option>
                            @endif
                            @if($statistic->type=='هيئة التدريس')
                                <option value="معيد" @if($statistic->degree=='معيد') selected @endif> معيد</option>
                                <option value="ماجستير" @if($statistic->degree=='ماجستير') selected @endif> ماجستير
                                </option>
                                <option value="دكتوراة" @if($statistic->degree=='دكتوراة') selected @endif> دكتوراة
                                </option>
                            @endif
                            @if($statistic->type=='الهيئة الادارية')
                                <option value="اداري" @if($statistic->degree=='اداري') selected @endif> اداري</option>
                                <option value="عامل" @if($statistic->degree=='عامل') selected @endif> عامل</option>
                            @endif
                        </select></td>

                    <td class="text-right"><select id="status"
                                                   name="statustics[][status]"
                                                   class="form-control">
                            @if($statistic->type=='الطلاب و الخريجيين')
                                <option value="مستجدون" @if($statistic->status=='مستجدون') selected @endif> مستجدون
                                </option>
                                <option value="ملتحقون" @if($statistic->status=='ملتحقون') selected @endif>ملتحقون
                                </option>
                                <option value="خريجون" @if($statistic->status=='خريجون') selected @endif>خريجون</option>
                            @endif
                            @if($statistic->type=='هيئة التدريس' or $statistic->type=='الهيئة الادارية' )

                                <option value="متعاقد" @if($statistic->status=='متعاقد') selected @endif> متعاقد
                                </option>
                                <option value="ثابت" @if($statistic->status=='ثابت') selected @endif> ثابت</option>
                            @endif
                        </select></td>

                    <td class="text-right"><select id="gender" name="statustics[][gender]" class="form-control">
                            <option value="ذكور" @if($statistic->gender=='ذكور') selected @endif> ذكور</option>
                            <option value="اناث" @if($statistic->gender=='اناث') selected @endif>اناث</option>
                        </select></td>

                    <td class="text-right"><select id="uni_type" class="form-control">
                            <option value="حكومي" selected> حكومي</option>
                            <option value="خاص"> خاص</option>
                            <option value="الكل">الكل</option>
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


        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>كل الجامعات </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div id="echart_pie3" style="height:350px;"></div>

                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="clearfix"></div>


    <!-- /page content -->

@endsection

@section('breadcrumb')

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

@section('scripts')


    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ url('Echarts/esl.js') }}"></script>
    <script src="{{ url('Echarts/testHelper.js') }}"></script>
@endsection
