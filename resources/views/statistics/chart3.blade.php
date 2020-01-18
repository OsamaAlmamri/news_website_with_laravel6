@php $link = 'statistic_1' @endphp
@extends('../admin.layout')

@section('title') المدراء @endsection

@section('content')
    <!-- page content -->
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>نمودار دیگر</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="جست و جو برای...">
                            <span class="input-group-btn">
                      <button class="btn btn-default" type="button">برو!</button>
                    </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>انواع دیگر نمودارها
                                <small> انواع گراف های مختلف</small>
                            </h2>
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

                            <div class="row">
                                <div class="col-md-6" style="padding: 30px">
                                    <p>نقشه برداری ایران</p>
                                    <div id="iran_map" style="height:400px !important;"></div>
                                </div>
                                <div class="col-md-6" style="padding: 30px">
                                    <p>نقشه برداری جهان</p>
                                    <div id="world-map-gdp" style="height:400px;"></div>
                                </div>
                            </div>
                            <div class="clearfix"></div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="panel panel-body">
                                        <div class="x_title">
                                            <h4>نمودار پای آسان</h4>
                                        </div>

                                        <p>نمودار پایه آسان پلاگین جی کوئری است که با استفاده از عنصر بوم برای رندر بسیار
                                            قابل تنظیم، بسیار آسان برای پیاده سازی، نمودار ساده پای برای ارزش های واحد.</p>
                                        <div class="row">
                                            <div class="col-xs-4">
                              <span class="chart" data-percent="86">
                                              <span class="percent"></span>
                              </span>
                                            </div>
                                            <div class="col-xs-4">
                              <span class="chart" data-percent="73">
                                              <span class="percent"></span>
                              </span>
                                            </div>
                                            <div class="col-xs-4">
                              <span class="chart" data-percent="60">
                                              <span class="percent"></span>
                              </span>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="panel panel-body">
                                        <div class="x_title">
                                            <h4>نمودار درون خطی Sparkline</h4>
                                        </div>

                                        <p>با این حال، یک کتابخانه بزرگ دیگر برای تجسم داده های درون خطی</p>
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th style="width:20%"></th>
                                                <th style="width:50%"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th>
                                  <span class="sparkline_line" style="height: 160px;">
                                                      <canvas width="200" height="60"
                                                              style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                                  </span>
                                                </th>
                                                <td>نمودار خطی</td>
                                            </tr>
                                            <tr>
                                                <th>
                                  <span class="sparkline_area" style="height: 160px;">
                                                      <canvas width="200" height="60"
                                                              style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                                  </span>
                                                </th>
                                                <td>نمودار خطی منطقه‌ای</td>
                                            </tr>
                                            <tr>
                                                <th>
                                  <span class="sparkline_bar" style="height: 160px;">
                                                      <canvas width="200" height="60"
                                                              style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                                  </span>
                                                </th>
                                                <td>نمودار میله‌ای</td>
                                            </tr>
                                            <tr>
                                                <th>
                                  <span class="sparkline_pie" style="height: 160px;">
                                                      <canvas width="200" height="60"
                                                              style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                                  </span>
                                                </th>
                                                <td>نمودار پای</td>
                                            </tr>
                                            <tr>
                                                <th>
                                  <span class="sparkline_discreet" style="height: 160px;">
                                                      <canvas width="200" height="60"
                                                              style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                                  </span>
                                                </th>
                                                <td>نمودار گسسته</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- /page content -->


@endsection

@section('breadcrumb')

@endsection

@section('js')

@endsection

@section('scripts')

    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
@endsection
