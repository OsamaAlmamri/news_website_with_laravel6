@extends('site.layout')
<?php $link = 'login' ?>
@section('title')
   تسجيل الدخول
@endsection
@section('content')
    <div class="d-flex justify-content-center h-100">
        <div class="user_card">
            <div class="d-flex justify-content-center">
                <div class="brand_logo_container">
                    <img src="/assets/website/default_login.jpg" class="brand_logo" alt="Logo">
                </div>
            </div>
            <div class="d-flex justify-content-center form_container">
                {!! Form::open(['role' => 'form', 'method' => 'post', 'route' => 'user.attempt']) !!}
                @if(session()->has('auth.failed'))
                    <div class="input-group mb-3">
                        <span class="badge badge-danger btn-block text-center">خطأ في ادخال بيانات اسم المستخدم أو كلمة المرور</span>
                    </div>
                @endif

                <div class="input-group mb-3 ">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                    </div>
                    <input type="text" name="username" class="form-control input_user " value="{{old('username')}}"
                           placeholder="username">
                </div>

                <div class="input-group mb-2">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-key"></i></span>
                    </div>
                    <input type="password" name="password" class="form-control input_pass" value=""
                           placeholder="password">
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customControlInline">
                        <label class="custom-control-label" for="customControlInline">تذكرني </label>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-3 login_container">
                    <input type="submit" name="submit" class="btn login_btn"/>
                </div>
                {!! Form::close() !!}
            </div>

            <div class="mt-4">
                <div class="d-flex justify-content-center links">
                    هل بديك حساب من قبل ؟ <a href="{{route('singUp')}}" class="ml-2">التسجيل بالموقع</a>
                </div>
                <div class="d-flex justify-content-center links">
                    <a href="#">هل نسيمت كلمة السر</a>
                </div>
            </div>
        </div>
    </div>
@endsection

