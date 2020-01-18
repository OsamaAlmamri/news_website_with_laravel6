<?php
$has_elment = 0;
$has_elment = 0;
?>

<div class="row  center-block text-center" style="background-color: #0b97c4">
    <li class="nav-item list-unstyled ">
        <span> {{$content->display_name}} </span>
    </li>
</div>
<br>
@foreach($content->advertismens as $ad  )

    <?php  $has_elment = 1;?>
    <div class="clearfix"></div>
    <div class="card">
        <h4 class="card-title">  {{$ad->advertisment->title}}</h4>
        <img class="card-img-top" src="{{url($ad->advertisment->image)}}" alt="Card image" style="width:100%">
        <div class="card-body">
            <p class="card-text">{!! $ad->advertisment->editor !!}</p>
            {{--                    <a href="#" class="btn btn-primary stretched-link">See Profile</a>--}}
        </div>
    </div>

@endforeach
@if($has_elment==0)
    <div class="card">
        <h4 class="card-title">  {{getSetting('default_advertisment_title')}}</h4>
        <img class="card-img-top" src="{{url(getSetting('default_advertisment_image'))}}" alt="Card image"
             style="width:100%">
        <div class="card-body">
            <p class="card-text">{!! getSetting('default_advertisment_text') !!}</p>
            {{--                    <a href="#" class="btn btn-primary stretched-link">See Profile</a>--}}
        </div>
    </div>
        <br>
@endif
