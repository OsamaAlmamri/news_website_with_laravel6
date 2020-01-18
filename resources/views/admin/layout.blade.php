<!DOCTYPE html>
<html style="direction: rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta name="fontiran.com:license" content="Y68A9">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap -->
    <link href="{{ url('vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ url('vendors/bootstrap-rtl/dist/css/bootstrap-rtl.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ url('vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ url('vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{ url('vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ url('vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="{{ url('vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">

    <link href="{{url('vendors/google-code-prettify/bin/prettify.min.css')}}" rel="stylesheet">

    <!-- Select2 -->
    <link href="{{url('vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('vendors/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

    <!-- Switchery -->
    <link href="{{url('vendors/switchery/dist/switchery.min.css')}}" rel="stylesheet">
    <!-- starrr -->
    <link href="{{url('vendors/starrr/dist/starrr.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('vendors/jquery-ui/jquery-ui.css') }}">


    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

    <!-- Custom Theme Style -->
    @yield('style')
    <link href="{{ url('build/css/custom.min.css')}}" rel="stylesheet">


</head>
<body class="nav-md">
<div class="container body">
    <div class="main_container">

        <!-- menu start -->
    @include('admin.includes.menu')
    <!-- menu end -->
        <!-- top navigation -->
    @include('admin.includes.topNavigation')

    <!-- /top navigation -->
        <!-- /header content -->

        <!-- page content -->

        <div class="right_col" role="main">
            @include('admin.messages')
            @yield('breadcrumb')

            @yield('content')
        </div>


        <!-- footer content -->
    @include('admin.includes.footer')



    <!-- /footer content -->
    </div>
</div>


<!-- lock_screen start -->
@include('admin.includes.lock_screen')



<!-- lock_screen end -->


<!-- jQuery -->
<script src="{{ url('vendors/jquery/dist/jquery.min.js')}}"></script>

<!-- Bootstrap -->
<script src="{{ url('vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ url('vendors/fastclick/lib/fastclick.js')}}"></script>
<!-- NProgress -->
<script src="{{ url('vendors/nprogress/nprogress.js')}}"></script>
<!-- bootstrap-progressbar -->
<script src="{{ url('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
<!-- iCheck -->
<script src="{{ url('vendors/iCheck/icheck.min.js')}}"></script>

<!-- bootstrap-daterangepicker -->
<script src="{{ url('vendors/moment/min/moment.min.js')}}"></script>

<script src="{{ url('vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

<!-- Chart.js -->
<script src="{{ url('vendors/Chart.js/dist/Chart.min.js')}}"></script>
<!-- jQuery Sparklines -->
<script src="{{ url('vendors/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- gauge.js -->
<script src="{{ url('vendors/gauge.js/dist/gauge.min.js')}}"></script>
<!-- Skycons -->
<script src="{{ url('vendors/skycons/skycons.js')}}"></script>
<!-- Flot -->
<script src="{{ url('vendors/Flot/jquery.flot.js')}}"></script>
<script src="{{ url('vendors/Flot/jquery.flot.pie.js')}}"></script>
<script src="{{ url('vendors/Flot/jquery.flot.time.js')}}"></script>
<script src="{{ url('vendors/Flot/jquery.flot.stack.js')}}"></script>
<script src="{{ url('vendors/Flot/jquery.flot.resize.js')}}"></script>
<!-- Flot plugins -->
<script src="{{ url('vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
<script src="{{ url('vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
<script src="{{ url('vendors/flot.curvedlines/curvedLines.js')}}"></script>
<!-- DateJS -->
<script src="{{ url('vendors/DateJS/build/production/date.min.js')}}"></script>


<!-- Custom Theme Scripts -->
{{--<script src="../build/js/custom.min.js"></script>--}}



<!-- Custom Theme Scripts -->


<!-- easy-pie-chart -->
<script src="{{ url('vendors/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js')}}"></script>
<!-- morris.js -->
<script src="{{ url('vendors/raphael/raphael.min.js')}}"></script>
<script src="{{ url('vendors/morris.js/morris.min.js')}}"></script>


<!-- ECharts -->
<script src="{{ url('vendors/echarts/dist/echarts.min.js')}}"></script>
<script src="{{ url('vendors/echarts/map/js/world.js')}}"></script>


{{--<!-- Custom Theme Scripts -->--}}
{{--<!-- jQuery Tags Input -->--}}
{{--<script src="{{url('vendors/jquery.tagsinput/src/jquery.tagsinput.js')}}"></script>--}}
{{--<!-- Switchery -->--}}
{{--<script src="{{url('vendors/switchery/dist/switchery.min.js')}}"></script>--}}
{{--<!-- Select2 -->--}}
{{--<script src="{{url('vendors/select2/dist/js/select2.full.min.js')}}"></script>--}}
{{--<!-- Parsley -->--}}
{{--<script src="{{url('vendors/parsleyjs/dist/parsley.min.js')}}"></script>--}}
{{--<script src="{{url('vendors/parsleyjs/dist/i18n/fa.js')}}"></script>--}}
{{--<!-- Autosize -->--}}
{{--<script src="{{url('vendors/autosize/dist/autosize.min.js')}}"></script>--}}
{{--<!-- jQuery autocomplete -->--}}
{{--<script src="{{url('vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js')}}"></script>--}}
{{--<!-- starrr -->--}}
{{--<script src="{{url('vendors/starrr/dist/starrr.js')}}"></script>--}}

{{--<script src="{{url('vendors/jquery-ui/jquery-ui.js') }}"></script>--}}

{{--<script src="{{url('vendors/select2/js/select2.full.min.js') }}"></script>--}}




<!-- Custom Theme Scripts -->
@yield('char_js')

@yield('scripts')

<script src="{{ url('build/js/custom.min.js')}}"></script>


@yield('js')


</body>
</html>
