@extends('site.layout')
<?php $link = 'signUp' ?>

@section('title')
    التسجيل بالموقع
@endsection
@section('content')

    <div class="d-flex justify-content-center h-100 ">
        <div class="user_card">
            <div class="d-flex justify-content-center">
                <div class="brand_logo_container">
                    <img src="/assets/website/default_login.jpg" class="brand_logo" alt="Logo">
                </div>
            </div>
            <div class="d-flex justify-content-center form_container">
                {!! Form::open(['role' => 'form', 'method' => 'post', 'route' => 'admin.users.store', 'files' => true]) !!}

                <div class="input-group mb-2">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                    </div>
                    <input type="text" name="name"
                           class="form-control input_user "
                           value="{{old('name')}}"
                           placeholder="name">
                    @error('name') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror

                </div>

                <div class="input-group mb-2">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                    </div>

                    <input type="text" name="username"
                           class="form-control input_user "
                           value="{{old('username')}}"
                           placeholder="username">
                    @error('username') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror

                </div>

                <div class="input-group mb-2">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                    </div>
                    <input type="email" name="email"
                           class="form-control input_pass"
                           value="{{old('email')}}" placeholder="email">
                    @error('email') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror

                </div>


                <div class="input-group mb-2">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-key"></i></span>
                    </div>
                    <input type="password" name="password"
                           class="form-control " value=""
                           placeholder="password">
                    @error('password') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror

                </div>


                <div class="input-group mb-2">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-key"></i></span>
                    </div>
                    <input type="password" name="password_confirmation"
                           class="form-control input_pass "
                           value="" placeholder="conform password">
                    @error('password_confirmation') <span
                        class="btn-block badge badge-danger">{{ $message }}</span> @enderror

                </div>


                <div class="input-group mb-2">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                    </div>
                    <input type="text" name="phone"
                           class="form-control input_pass "
                           value="{{old('phone')}}"
                           placeholder="phone">
                    @error('phone') <span class="btn-block badge badge-danger">{{ $message }}</span> @enderror

                </div>


                <div class="d-flex justify-content-center mt-3 login_container">
                    <input type="submit" name="SinUp" value="SinUp" class="btn login_btn"/>
                </div>
                {!! Form::close() !!}
            </div>

            <div class="mt-4">
                <div class="d-flex justify-content-center links">
                    Do You have an account? <a href="{{route('login')}}" class="ml-2">تسجيل الدخول</a>
                </div>

            </div>
        </div>
    </div>


@endsection
