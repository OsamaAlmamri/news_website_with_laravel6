@extends('site.layout')
<?php $link = 'news' ?>
@section('title')
    اخر الاخبار

@endsection
@section('content')
    @foreach($news as $n)
        <div class="media">
            <img src="{{url($n->logo)}}" class="align-self-start mr-3" style="width:250px">
            <div class="media-body">
                <h6>{{$n->title}} </h6>
                <p>  {{ $n->introduction }}</p>
                <a href="{{  route('admin.news.show',( $n->id)) }}"> عرض المزيد.. </a>
            </div>
        </div>

        <div class="clearfix"></div>

    @endforeach

    <div style="padding-right: 174px;">

        {!! $news->render() !!}
    </div>
@endsection


