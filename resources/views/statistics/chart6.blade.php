@php $link = 'statistic_1' @endphp
@extends('../admin.layout')

@section('title') المدراء @endsection

@section('content')


    <style>
        html, body, #main {
            width: 100%;
            height: 100%;
            margin: 0;
        }
        #main {
            width: 100%;
            background: #fff;
        }
    </style>
    <div id="main"></div>

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
                    data:['A', 'B', 'C', 'D']
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




        var CollageData = [
            {
                value: 335,
                name: 'الحكمة'
            }, {
                value: '310',
                name: 'ازال'
            }, {
                value: '234',
                name: 'الجزيرة'
            }, {
                value: '135',
                name: 'الرازي'
            }, {
                value: '1548',
                name: 'جامعة صنعاء'
            }, {
                value: 24,
                name: '21 مارس'
            }, {
                value: 135,
                name: 'المستقبل'
            }, {
                value: 988,
                name: 'العلوم والتكنلوجيا'
            }
        ];
        var CollageName = ['الحكمة', 'ازال', 'الجزيرة', 'الرازي', 'جامعة صنعاء', 'العلوم والتكنلوجيا', "المستقبل", "21 مارس"];
        ColorsOfThems = [

            '#9B59B6', '#8abb6f', '#759c6a', '#bfd3b7',
            '#26B99A', '#34495E', '#BDC3C7', '#3498DB',
        ];


        var theme = {
            color: ColorsOfThems,

            title: {
                itemGap: 8,
                textStyle: {
                    fontWeight: 'normal',
                    color: '#408829'
                }
            },

            dataRange: {
                color: ['#1f610a', '#97b58d']
            },

            toolbox: {
                color: ['#408829', '#408829', '#408829', '#408829']
            },

            tooltip: {
                backgroundColor: 'rgba(0,0,0,0.5)',
                axisPointer: {
                    type: 'line',
                    lineStyle: {
                        color: '#408829',
                        type: 'dashed'
                    },
                    crossStyle: {
                        color: '#408829'
                    },
                    shadowStyle: {
                        color: 'rgba(200,200,200,0.3)'
                    }
                }
            },

            dataZoom: {
                dataBackgroundColor: '#eee',
                fillerColor: 'rgba(64,136,41,0.2)',
                handleColor: '#408829'
            },
            grid: {
                borderWidth: 0
            },

            categoryAxis: {
                axisLine: {
                    lineStyle: {
                        color: '#408829'
                    }
                },
                splitLine: {
                    lineStyle: {
                        color: ['#eee']
                    }
                }
            },

            valueAxis: {
                axisLine: {
                    lineStyle: {
                        color: '#408829'
                    }
                },
                splitArea: {
                    show: true,
                    areaStyle: {
                        color: ['rgba(250,250,250,0.1)', 'rgba(200,200,200,0.1)']
                    }
                },
                splitLine: {
                    lineStyle: {
                        color: ['#eee']
                    }
                }
            },
            timeline: {
                lineStyle: {
                    color: '#408829'
                },
                controlStyle: {
                    normal: {color: '#408829'},
                    emphasis: {color: '#408829'}
                }
            },

            k: {
                itemStyle: {
                    normal: {
                        color: '#68a54a',
                        color0: '#a9cba2',
                        lineStyle: {
                            width: 1,
                            color: '#408829',
                            color0: '#86b379'
                        }
                    }
                }
            },
            map: {
                itemStyle: {
                    normal: {
                        areaStyle: {
                            color: '#ddd'
                        },
                        label: {
                            textStyle: {
                                color: '#c12e34'
                            }
                        }
                    },
                    emphasis: {
                        areaStyle: {
                            color: '#99d2dd'
                        },
                        label: {
                            textStyle: {
                                color: '#c12e34'
                            }
                        }
                    }
                }
            },
            force: {
                itemStyle: {
                    normal: {
                        linkStyle: {
                            strokeColor: '#408829'
                        }
                    }
                }
            },
            chord: {
                padding: 4,
                itemStyle: {
                    normal: {
                        lineStyle: {
                            width: 1,
                            color: 'rgba(128, 128, 128, 0.5)'
                        },
                        chordStyle: {
                            lineStyle: {
                                width: 1,
                                color: 'rgba(128, 128, 128, 0.5)'
                            }
                        }
                    },
                    emphasis: {
                        lineStyle: {
                            width: 1,
                            color: 'rgba(128, 128, 128, 0.5)'
                        },
                        chordStyle: {
                            lineStyle: {
                                width: 1,
                                color: 'rgba(128, 128, 128, 0.5)'
                            }
                        }
                    }
                }
            },
            gauge: {
                startAngle: 225,
                endAngle: -45,
                axisLine: {
                    show: true,
                    lineStyle: {
                        color: [[0.2, '#86b379'], [0.8, '#68a54a'], [1, '#408829']],
                        width: 8
                    }
                },
                axisTick: {
                    splitNumber: 10,
                    length: 12,
                    lineStyle: {
                        color: 'auto'
                    }
                },
                axisLabel: {
                    textStyle: {
                        color: 'auto'
                    }
                },
                splitLine: {
                    length: 18,
                    lineStyle: {
                        color: 'auto'
                    }
                },
                pointer: {
                    length: '90%',
                    color: 'auto'
                },
                title: {
                    textStyle: {
                        color: '#333'
                    }
                },
                detail: {
                    textStyle: {
                        color: 'auto'
                    }
                }
            },
            textStyle: {
                fontFamily: 'Arial, Verdana, sans-serif'
            }
        };


        $.ajax({
            url: '{{route('admin.statistics.fetchCharData2')}}',
            dataType: 'json',
            method: 'post',
            data: '_token=' + encodeURIComponent("{{csrf_token()}}") + '&filter_name=' + encodeURIComponent('k'),
            success: function (json) {

                for (c of json[0].data) {
                    // console.log(c[0].name);
                    CollageData.push(c[0]);
                }
                console.log(CollageData.length);
                // CollageData=json[0].data;
                // CollageName = json[0].name;
                // CollageValue = json[0].value;


                if ($('#echart_pie3').length) {

                    // char_bar('echart_pie3', theme, CollageName, CollageData)
                    char_bar3('echart_pie3', theme)
                    //  char_bar3('echart_pie3', theme, CollageName, CollageValue)
                }


            }, error: function (err) {
                console.log(err);
            }
        });


        function char_bar(cahr_id, theme, CollageName, CollageData) {
            var echartPie = echarts.init(document.getElementById(cahr_id), theme);
            echartPie.setOption(
                {
                tooltip: {
                    trigger: 'item',
                    formatter: "{a} <br/>{b} : {c} ({d}%)"
                },
                legend: {
                    x: 'center',
                    y: 'bottom',
                    data: CollageName
                },
                toolbox: {
                    show: true,
                    feature: {
                        magicType: {
                            show: true,
                            type: ['pie', 'funnel'],
                            option: {
                                funnel: {
                                    x: '25%',
                                    width: '50%',
                                    funnelAlign: 'left',
                                    max: 1548
                                }
                            }
                        },
                        restore: {
                            show: true,
                            title: "تحديث"
                        },
                        saveAsImage: {
                            show: true,
                            title: "تصوير"
                        }
                    }
                },
                calculable: true,
                series: [{
                    name: 'الجامعات',
                    type: 'pie',
                    radius: '70%',
                    center: ['50%', '50%'], label: {
                        normal: {
                            formatter: ' {b}  {d}%'
                        }
                    },
                    data: CollageData,
                }]
            }
            );

            var dataStyle = {
                normal: {
                    label: {
                        show: false
                    },
                    labelLine: {
                        show: false
                    }
                }
            };

            var placeHolderStyle = {
                normal: {
                    color: 'rgba(0,0,0,0)',
                    label: {
                        show: false
                    },
                    labelLine: {
                        show: false
                    }
                },
                emphasis: {
                    color: 'rgba(0,0,0,0)'
                }
            };

        }
        function char_bar2(cahr_id, theme, CollageName, CollageValue)
        {


                var echartBar = echarts.init(document.getElementById(cahr_id), theme);

                echartBar.setOption({
                    title: {
                        text: '  الطلاب ',
                        subtext: 'كلية  '
                    },
                    tooltip: {
                        trigger: 'axis'
                    },
                    legend: {
                        x: 100,
                        data: ['2015', '2016']
                    },
                    toolbox: {
                        show: true,
                        feature: {
                            saveAsImage: {
                                show: true,
                                title: "الطلاب "
                            }
                        }
                    },
                    calculable: true,
                    xAxis: [{
                        type: 'value',
                        boundaryGap: [0, 0.01]
                    }],
                    yAxis: [{
                        type: 'category',
                        data: ['المتعاقدون','الخريجون', 'المستجدون']
                    }],
                    series: [
                        {
                        name: '2015',
                        type: 'bar',
                        data:[19325, 23438, 31000, 121594, 134141, 681807]
                    },
                        {
                        name: '2016',
                        type: 'bar',
                        data: [19325, 23438, 31000, 121594, 134141, 681807]
                    }
                    ]
                });


        }


        function char_bar3(cahr_id, theme)
        {

            var echartBar = echarts.init(document.getElementById(cahr_id), theme);

            echartBar.setOption({
                title: {
                    text: 'عنوان النموذج',
                    subtext: 'عنوان النموذج الفرعي'
                },
                tooltip: {
                    trigger: 'axis'
                },
                legend: {
                    data: ['الذكور', 'الاناث']
                },
                toolbox: {
                    show: false
                },
                calculable: false,
                xAxis: [{
                    type: 'category',
                    data: ['الذكور', 'الاناث']
                }],
                yAxis: [{
                    type: 'value'
                }],
                series: [
                //     {
                //     name: 'الجامعات',
                //     type: 'bar',
                //     data:CollageValue,
                //     markPoint: {
                //         data: [{
                //             type: 'max',
                //             name: '???'
                //         }, {
                //             type: 'min',
                //             name: '???'
                //         }]
                //     },
                //     markLine: {
                //         data: [{
                //             type: 'average',
                //             name: '???'
                //         }]
                //     }
                // },
                    {
                    name: 'الاناث',
                    type: 'bar',
                    data: [2.6, 5.9, 9.0, 26.4, 28.7, 70.7, 175.6, 182.2, 48.7, 18.8, 6.0, 2.3],
                    markPoint: {
                        data: [{
                            name: 'الذكور',
                            value: 182.2,
                            xAxis: 7,
                            yAxis: 183,
                        }, {
                            name: 'الاناث',
                            value: 2.3,
                            xAxis: 11,
                            yAxis: 3
                        }
                        ]
                    },
                    markLine: {
                        data: [{
                            type: 'average',
                            name: '???'
                        }]
                    }
                }
                ]
            });


        }


        // char_bar3('echart_pie3', theme)

        if ($('#echart_pie3').length) {

            var echartPie = echarts.init(document.getElementById('echart_pie3'), null);

            echartPie.setOption({
                color: ['#003366', '#006699', '#4cabce', '#e5323e'],
                tooltip: {
                    trigger: 'axis',
                    axisPointer: {            // 坐标轴指示器，坐标轴触发有效
                        type: 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
                    }
                },
                legend: {
                    data:['A', 'B']
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
                    }

                ]
            });


        }


        // function test() {
        //
        //     if ($('#echart_pie3').length) {
        //
        //         var echartPie = echarts.init(document.getElementById('echart_pie3'), null);
        //
        //         echartPie.setOption({
        //             color: ['#003366', '#006699', '#4cabce', '#e5323e'],
        //             tooltip: {
        //                 trigger: 'axis',
        //                 axisPointer: {            // 坐标轴指示器，坐标轴触发有效
        //                     type: 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
        //                 }
        //             },
        //             legend: {
        //                 data:['A', 'B', 'C', 'D']
        //             },
        //             toolbox: {
        //                 show: true,
        //                 orient: 'vertical',
        //                 left: 'right',
        //                 top: 'center',
        //                 feature: {
        //                     mark: {show: true},
        //                     dataView: {show: true, readOnly: false},
        //                     magicType: {show: true, type: ['line', 'bar', 'stack', 'tiled']},
        //                     restore: {show: true},
        //                     saveAsImage: {show: true}
        //                 }
        //             },
        //             calculable: true,
        //             xAxis: [
        //                 {
        //                     type: 'category',
        //                     axisTick: {show: false},
        //                     data: ['2012', '2013', '2014', '2015', '2016']
        //                 }
        //             ],
        //             yAxis: [
        //                 {
        //                     type: 'value'
        //                 }
        //             ],
        //             series: [
        //                 {
        //                     name: 'A',
        //                     type: 'bar',
        //                     barGap: 0,
        //                     label: labelOption,
        //                     data: [320, 332, 301, 334, 390]
        //                 },
        //                 {
        //                     name: 'B',
        //                     type: 'bar',
        //                     label: labelOption,
        //                     data: [220, 182, 191, 234, 290]
        //                 },
        //                 {
        //                     name: 'C',
        //                     type: 'bar',
        //                     label: labelOption,
        //                     data: [150, 232, 201, 154, 190]
        //                 },
        //                 {
        //                     name: 'D',
        //                     type: 'bar',
        //                     label: labelOption,
        //                     data: [98, 77, 101, 99, 30]
        //                 }
        //             ]
        //         });
        //
        //
        //     }
        //
        //
        // }
    </script>

@endsection

@section('scripts')


    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ url('Echarts/esl.js') }}"></script>
@endsection
