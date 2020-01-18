<?php
$has_elment = 0;
$has_elment = 0;
?>

<div class="row  center-block text-center" style="background-color: #0b97c4">
    <li class="nav-item list-unstyled ">
        <span> {{$content->name}} </span>
    </li>
</div>
<br>
@foreach($content->voites as $voit  )

    <?php  $has_elment = 1;?>
    <div class="clearfix"></div>
    <div class="card">
        <h4 class="card-title">  {{$voit->voit->title}}</h4>
        <img class="card-img-top" src="{{url($voit->voit->image)}}" alt="Card image" style="width:100%">
        <div class="card-body">
            <p class="card-text">{!! $voit->voit->editor !!}</p>
            <ul>
                @foreach($voit->voit->voit_values as $value)
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" value="{{$value->id}}"
                                   name="voit{{$content->id}}">{{$value->name}}
                        </label>
                    </div>


                @endforeach

            </ul>
            <button onclick="voit('{{$content->id}}','{{$voit->voit->id}}')" class="btn btn-primary stretched-link">
                تصويت
            </button>
        </div>
    </div>

@endforeach

{{--@if($has_elment==0)--}}
{{--    <div class="card">--}}
{{--        <h4 class="card-title">  {{getSetting('default_advertisment_title')}}</h4>--}}
{{--        <img class="card-img-top" src="{{url(getSetting('default_advertisment_image'))}}" alt="Card image"--}}
{{--             style="width:100%">--}}
{{--        <div class="card-body">--}}
{{--            <p class="card-text">{!! getSetting('default_advertisment_text') !!}</p>--}}
{{--            --}}{{--                    <a href="#" class="btn btn-primary stretched-link">See Profile</a>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <br>--}}
{{--@endif--}}
