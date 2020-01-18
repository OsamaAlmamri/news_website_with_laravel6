@php $link = 'statistic_1' @endphp
@extends('../admin.layout')

@section('title') المدراء @endsection

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
                    <td class="text-right"> اختيار الجامعة</td>
                    <td class="text-left"> نوع الاحصائية</td>
                    <td class="text-right">نوع الفئة</td>
                    <td class="text-right">السنة</td>
                    <TD> فلترة</TD>
                </tr>
                </thead>
                <tbody>


                </tbody>


                <tfoot>

                <tr id="discount-row">
                    <td class="text-left">

                        {!!Form ::select('university', $universities,isset($statistic )?$statistic->university_id:null,['class' => 'form-control', 'id' => 'statustics_university'])!!}

                    </td>
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
                    <td class="text-right"><select id="statustics_year" name="statustics[][year]"
                                                   class="form-control">
                            <option value="2016/2017" @if($statistic->year=='2016/2017') selected @endif>2016/2017
                            </option>
                            <option value="2017/2018" @if($statistic->year=='2017/2018') selected @endif> 2017/2018
                            </option>
                            <option value="2018/2019" @if($statistic->year=='2018/2019') selected @endif> 2018/2019
                            </option>
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

            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>نمودار پای</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">تنظیمات 1</a>
                                    </li>
                                    <li><a href="#">تنظیمات 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div id="echart_pie3" style="height:350px;"></div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- /page content -->

@endsection

@section('breadcrumb')

@endsection

@section('char_js')

    <script>

        function filter(){

            var university=$("#statustics_university").val();
            var type=$("#statustics_type").val();
            var status=$("#status").val();
            var year=$("#statustics_year").val();
            fetchChar(university,type,status);

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

            $("#degree" ).html(html);
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
        var xAxis = ['2012', '2013', '2014', '2015', '2016'];
        var male = [320, 332, 301, 334, 390];
        var female = [220, 182, 191, 234, 290];


        function fetchChar(university_id, type, status) {
            $.ajax({
                url: '{{route('admin.statistics.fetchStatisticsCharAccordingForUniversity')}}',
                dataType: 'json',
                method: 'post',
                data: '_token=' + encodeURIComponent("{{csrf_token()}}") +
                    '&university_id=' + encodeURIComponent(university_id) +
                    '&type=' + encodeURIComponent(type) + '&status=' + encodeURIComponent(status),
                success: function (json) {
                    console.log(json[0].male);
                    // CollageData=json[0].data;
                    // CollageName = json[0].name;
                    test(json[0].degree, json[0].male, json[0].female);
                }, error: function (err) {
                    console.log(err);
                    test(xAxis, male, female);
                }
            });


        }


        function test(xAxis, male, female) {

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
                        data: ['ذكور', 'اناث',]
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
                            data: xAxis
                        }
                    ],
                    yAxis: [
                        {
                            type: 'value'
                        }
                    ],
                    series: [
                        {
                            name: 'ذكور',
                            type: 'bar',
                            barGap: 0,
                            label: labelOption,
                            data: male
                        },
                        {
                            name: 'اناث',
                            type: 'bar',
                            label: labelOption,
                            data: female
                        }
                    ]
                });


            }
        }

        fetchChar(3, 'الطلاب و الخريجيين', 'مستجدون');
    </script>

@endsection

@section('scripts')


    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ url('Echarts/esl.js') }}"></script>
@endsection
