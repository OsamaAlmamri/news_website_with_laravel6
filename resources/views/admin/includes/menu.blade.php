<!-- menu start -->
<div class="col-md-3 left_col hidden-print">
    <div class="left_col scroll-view">
        <style>
            .logo {
                width: 40px;
                height: 40px;
                color: white;
                background: white;
                border-radius: 50px;

            }
        </style>
        <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title">

                <span>هدهد سباء</span>
                <object data="{{url('bird.svg')}}" type="image/svg+xml" class="logo"></object>
            </a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{url('build/images/img.jpg')}}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>اسامة المعمري </span>
                <h2>Admin </h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br/>


        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>لوحة التحكم </h3>
                <ul class="nav side-menu">

                    <li><a><i class="fa fa-bar-chart-o"></i> احصائيات <span
                                class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">

                            <li><a href="{{ route('admin.universities.index') }}"> كل الجامعات </a></li>
                            @foreach(university() as $u)
                                <li><a>  {{$u->name }}<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li class="sub_menu"><a
                                                href="{{ route('admin.statistics.showStatistics',[ $u->id,'all']) }}">
                                                الكل</a></li>
                                        <li class="sub_menu"><a
                                                href="{{ route('admin.statistics.showStatistics',[ $u->id,'الطلاب و الخريجيين']) }}">
                                                الطلاب و الخريجيين</a></li>
                                        <li class="sub_menu"><a
                                                href="{{ route('admin.statistics.showStatistics', [$u->id,'هيئة التدريس']) }}">
                                                هيئة التدريس</a></li>
                                        <li class="sub_menu"><a
                                                href="{{ route('admin.statistics.showStatistics', [$u->id,'الهيئة الادارية']) }}">
                                                الهيئة الادارية</a></li>
                                    </ul>
                                </li>
                            @endforeach
                            <li><a href="{{ route('admin.statistics.index') }}"> all </a></li>
                            <li>
                                <a href="{{ route('admin.statistics.showStatisticsTableForAllUniversity',['الكل','الطلاب و الخريجيين','ملتحقون','بيكلاريوس','ذكور']) }}">
                                    الجداول </a></li>
                            <li><a href="{{ route('admin.statistic_1') }}"> احصائيات 1 </a></li>
                            <li><a href="{{ route('admin.statistic_2') }}"> احصائيات 2 </a></li>
                            <li><a href="{{ route('admin.statistic_3') }}"> احصائيات 3 </a></li>
                            <li><a href="{{ route('admin.statistic_4') }}"> احصائيات 4 </a></li>
                            <li><a href="{{ route('admin.statistic_5') }}"> احصائيات 5 </a></li>
                            <li><a href="{{ route('admin.statistic_6') }}"> احصائيات 6 </a></li>
                            <li><a href="{{ route('admin.statistic_7') }}"> احصائيات 7 </a></li>
                            <li><a href="{{ route('admin.statistic_8') }}"> احصائيات 8 </a></li>
                            <li><a href="{{ route('admin.statistic_9') }}"> احصائيات 9 </a></li>

                        </ul>
                    </li>

                    <li><a><i class="fa fa-users"></i> المدراء <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="">المدراء</a></li>
                            <li><a href=""> مجموعات المدراء</a></li>
                            <li><a href=""> المدراء المحذوفين </a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-building"></i> المستخدمين <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('admin.users.index') }}"> المستخدمين</a></li>
                            <li><a href=""> الموافقة على المستخدمين</a></li>
                            <li><a href=""> المستخدمين المحذوفين </a></li>

                        </ul>
                    </li>


                    <li><a><i class="fa fa-users"></i> الاقسام <span
                                class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">

                            <li><a href="{{ route('admin.categories.index') }}"> الاقسام </a></li>
                            <li><a href="{{ route('admin.categories.deleted') }}"> الاقسام المحذوفة</a></li>


                        </ul>
                    </li>

                    <li><a><i class="fa fa-users"></i> السلايدات <span
                                class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">

                            <li><a href="{{ route('admin.slides.index') }}"> السلايدات </a></li>
                            <li><a href="{{ route('admin.slides.deleted') }}"> السلايدات الموقفة </a></li>
                            <li><a href="{{ route('admin.slide_images.index') }}"> صور السلايدات </a></li>


                        </ul>
                    </li>


                    <li><a><i class="fa fa-users"></i> الاخبار العاجلة <span
                                class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">

                            <li><a href="{{ route('admin.liveNews.index') }}"> الاخبار العاجلة </a></li>
                            <li><a href="{{ route('admin.liveNews.deleted') }}"> الاخبار العاجلة المحذوفة </a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-desktop"></i> الاخبار <span
                                class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">

                            <li><a href="{{ route('admin.news.index') }}"> الاخبار </a></li>
                            <li><a href="{{ route('admin.news.deleted') }}"> الاخبار المحذوفة </a></li>
                            <li><a href=""> التعليقات </a></li>


                        </ul>
                    </li>

                    <li><a><i class="fa fa-desktop"></i> الاعلانات <span
                                class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('admin.advertisments.index') }}"> الاعلانات </a></li>
                            <li><a href="{{ route('admin.advertisments.deleted') }}"> الاعلانات المحذوفة </a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-desktop"></i> التصويتات <span
                                class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('admin.voites.index') }}"> التصويتات </a></li>
                            <li><a href="{{ route('admin.voites.deleted') }}"> التصويتات المحذوفة </a></li>
                            <li><a href=""> التصويتات الحالية </a></li>
                            <li><a href=""> التصويتات المكتملة </a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-desktop"></i> ادارة الملفات <span
                                class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">

                            <li><a href=""> الملفات </a></li>

                        </ul>
                    </li>


                    <li><a><i class="fa fa-users"></i> الضبط <span
                                class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('admin.settings.index') }}"> اعدادات عامة </a></li>
                            <li><a href="{{ route('admin.languages.index')  }}"> اللغات </a></li>


                        </ul>

                    <li><a href="javascript:void(0)"><i class="fa fa-windows"></i> اعدادات المطور </a></li>
                    </li>

                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="اعدادات">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title=" صفحة كاملة " onclick="toggleFullScreen();">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="قفل" class="lock_btn">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="خروج" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>

<!-- menu end -->
