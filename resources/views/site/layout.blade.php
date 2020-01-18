<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../Admin/images/logo2.png">
    <title>@yield('title') </title>
    <style type="text/css">
        #marquee {
            font-size: 18pt;
            color: #001cff;
            border-style: ridge;
            border-color: #E3BE13;
            background-color: #78ecff;


        }

        #marquee a {
            margin: 0 10px 0 10px;
        }
    </style>

    <link rel="stylesheet" href="{{ url('design/site/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ url('design/site/css/login.css')}}">
    <link rel="stylesheet" href="{{ url('design/site/fontawesome/css/all.css')}}">


    <script src="{{ url('design/site/js/jquery-3.3.1.slim.min.js')}}"></script>
    <script src="{{ url('design/site/js/popper.min.js')}}"></script>
    <script src="{{ url('design/site/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ url('vendors/jquery/dist/jquery.min.js')}}"></script>

    <style>
        @yield('style')

    </style>
</head>
<body>
<div id='up'></div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin:24px 0;">
    <a class="navbar-brand" href="{{route('home')}})">هدهد سباء</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navb">
        <ul class="navbar-nav mr-auto">
            @foreach(getMainMenu('main') as $item)
                @if(countChild($item->id)>0)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="">{{$item->name_ar}}</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{route('pages',$item->id)}}">الكل</a>

                            @foreach(returnChild($item->id) as $subItem)
                                <a class="dropdown-item"
                                   href="{{route('pages',$subItem->id)}}">{{$subItem->name_ar}}</a>
                            @endforeach
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('pages',$item->id)}}">{{$item->name_ar}}</a>
                    </li>
                @endif
            @endforeach
            @if(countAlsoMenu()>0)
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">المزيد</a>
                    <div class="dropdown-menu">
                        @foreach(getMainMenu('moreMenu') as $moreItem)
                            <a class="dropdown-item" href="{{route('pages',$moreItem->id)}}">{{$moreItem->name_ar}}</a>
                        @endforeach
                    </div>
                </li>
            @endif
            @if(isset(Auth::user()->id))
                <li class="nav-item">
                    <a class="nav-link " href="{{route('logout')}}"> تسجيل الخروج </a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link " href="{{route('login')}}">تسجيل الدخول </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{route('singUp')}}">انشاء حساب </a>
                </li>
            @endif
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
            <button class="btn btn-success my-2 my-sm-0" type="button">Search</button>
        </form>
    </div>
</nav>

@yield('slides')
@include('admin.messages')

<div class="container-fluid" style="margin-top:30px">

    <div class="row">


        @yield('content')
    </div>


    <div class="jumbotron text-center" style="margin-bottom:0">
        <p>Footer</p>
        <div class="container text-right text-center">
            <hr class=" featurette-divider">
            <div class="row" style="margin-bottom:5px;">
                <div class="col-md-4 tmp">
                    <h5>مواقع مشابهة</h5>
                    <ul type="none" class="dis">
                        <li><a href="#">www.samsung.com</a></li>
                        <li><a href="#">www.apple.com</a></li>
                    </ul>
                    <ul type="none" class="dis">
                        <li><a href="#">www.htc.com</a></li>
                        <li><a href="#">www.lg.com</a></li>
                    </ul>
                </div>
                <div class="col-md-4 tmp">
                    <h5>تفاعل معنا على شبكات التواصل الأجتماعي</h5>
                    <ul type="None">
                        <li class="dis"><a href="www.Facebook.com" class="facebook" data-toggle="tooltip"
                                           data-placement="bottom" title="Facebook"><i
                                    class="f fa-facebook"></i></a>
                        </li>
                        <li class="dis"><a href="www.Twitter.com" class="twitter" data-toggle="tooltip"
                                           data-placement="bottom"
                                           title="Twitter"><i class="fa fa-twitter-square fa-2x"></i></a></li>
                        <li class="dis"><a href="ww.Instagram.com" class="insta" data-toggle="tooltip"
                                           data-placement="bottom"
                                           title="Instagram"><i class="fa fa-instagram fa-2x"></i></a></li>
                        <li class="dis"><a href="www.Youtube.com" class="youtub" data-toggle="tooltip"
                                           data-placement="bottom"
                                           title="Youtube"><i class="fa fa-youtube-square fa-2x"></i></a></li>
                        <li class="dis"><a href="www.LinkedIn.com" class="facebook" data-toggle="tooltip"
                                           data-placement="bottom" title="LinkedIn"><i
                                    class="fa fa-linkedin-square fa-2x"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 text-center">
                    <h5>من نحن؟</h5>
                    <ul class="dis list-unstyle">
                        <li><a href="../useres/about.php">عنا</a></li>
                        <li><a href="../useres/contact.php">إتصل بنا</a></li>
                    </ul>
                </div>

            </div>
            <div align="center">
                <h4>جميع الحقوق محفوضة &copy 2019 </h4>
            </div>
        </div>

    </div>


    <div class='navbar navbar-inverse navbar-fixed-top'>
        <div class='container text-center'>
            <div class='navbar-header'>
                <button type='button' class='navbar-toggle collapsed' data-toggle='collapse'
                        data-target='#navbarsection'
                        aria-expanded='false' aria-controls='navbar'>
                    <span class='sr-only'>Toggle navigation</span>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                </button>
            </div>
            <div class='navbar-collapse collapse' id='navbarsection'>
                <ul class='nav navbar-nav navbar-left'>
                    <li><a href='index.php'>الرئيسية </a></li>
                    <li class='dropdown '>
                        <a href='' class='dropdown-toggle' data-toggle='dropdown'>
                            التصنيفات
                            <i class='fa fa-caret-down'></i></a>
                        <ul class='dropdown-menu'>
                            <li><a href='pages.php?cat_id=1'>????? </a></li>
                            <li><a href='pages.php?cat_id=2'>????? </a></li>
                            <li><a href='pages.php?cat_id=3'>?????? </a></li>
                        </ul>
                    </li>
                </ul>
                <div class='navbar-collapse navbar-right' id='navbarsection'>
                    <ul class='nav navbar-nav navbar-left'>
                        <li><a href='register.php'> التسجيل في موقعنا <i
                                    class='glyphicon glyphicon-edit'></i></a></li>
                        <li><a href='login.php'> تسجيل دخول <i class='glyphicon glyphicon-log-in'></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>


</div>
<@yield('js')
<@yield('resultJS')
</body>

</html>
