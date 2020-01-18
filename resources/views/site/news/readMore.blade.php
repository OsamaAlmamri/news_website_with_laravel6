@extends('site.layout')
<?php $link = 'readmore' ?>
@section('title')
  اقراء المزيد

@endsection
@section('content')
    <div class='row'>
        <div class='col-md-12 product-div  text-center'>
            <p class='h1'>{{$news->title}}</p>
            <div class='col-md-14' align=center>
                <img src="{{url($news->logo)}}" class='img-responsive'>
            </div>
            <div class='col-md-12'>
                <div style='padding: 10px 5px 5px 0px;'>
                    {!! $news->editor  !!}
                </div>
            </div>
            <a href="">
                <button class='btn btn-primary'>رجوع</button>
            </a>
        </div>
    </div>
    <h1>التعليقات</h1>

    <div style='margin-top: 50px;'>
        <div class='container'>
            <div class='text-primary' style='padding: 5px 0px 5px 0px; margin-top: -25px;'>
                There isn't Comment for this post
            </div>
        </div>
    </div>
    <br/><br/><br/>

@endsection
