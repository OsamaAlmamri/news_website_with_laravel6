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




@section('js')

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

        fetchChar('ماجستير', 'ذكور', 'الطلاب و الخريجيين', 'مستجدون', 'خاص');
    </script>
    <script>


        function showResult(id) {
            alert(id);
            $("#myModal").modal();
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

    <script src="{{ url('Echarts/esl.js') }}"></script>
    <script src="{{ url('Echarts/testHelper.js') }}"></script>
@endsection
