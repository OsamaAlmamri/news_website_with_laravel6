@extends('site.layout')
<?php $link = 'news' ?>
@section('title')
    اخر الاخبار

@endsection

@section('slides')

    @if( $category->hasSlides==1 )
        @include('site.includes.slides')
    @endif
    @if( $category->liveNews==1 )
        @include('site.includes.marquee')
    @endif
@endsection

@section('content')

    @if ($category->section_count > 1 )
        <div class="{{$right}}">

            @foreach($category_values_right as $content)


                @if($content->content=='اعلان')
                    @include('site.includes.advertisment')
                @elseif($content->content=='تصويت')
                    @include('site.includes.voit')

                @endif

            @endforeach
            @if($category->section_count ==2)
                @foreach($category_values_left as $content)
                    @if($content->content=='اعلان')
                        @include('site.includes.advertisment')

                    @endif
                @endforeach
            @endif

        </div>
    @endif

    <div class="{{$center}}">

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
    </div>

    @if ($category->section_count > 2)
        <div class="{{$right}}">
            @foreach($category_values_left as $content)
                @if($content->content=='اعلان')
                    @include('site.includes.advertisment')
                @elseif($content->content=='تصويت')
                    @include('site.includes.voit')

                @endif
            @endforeach
        </div>


    @endif

@endsection

@section('js')
    <script>

        function voit(option_id, voit_id) {
            var voitValue = $('input[name=voit' + option_id + ']:checked').val();
            if (voitValue == undefined)
                alert('يرجى اختيار التصويت');
            else {
                $.ajax({
                    url: '{{route('admin.categories_voit.voiting')}}',
                    dataType: 'json',
                    method: 'post',
                    data: '_token=' + encodeURIComponent("{{csrf_token()}}") +
                        '&option_id=' + encodeURIComponent(voitValue) +
                        '&voit_id=' + encodeURIComponent(voit_id),
                    success: function (json) {
                        console.log(json);
                        alert('تم التصويت بنجاح');
                    }, error: function (err) {
                        console.log(err);
                        alert('fff');
                    }
                });
            }


        }

        $(document).ready(function () {

        });
    </script>
@endsection








