<header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach($slide_images as $k=> $s)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{$s->id}}"
                    @if($k==0) class="active" @endif></li>

            @endforeach
        </ol>
        <div class="carousel-inner" role="listbox">
            <!-- Slide One - Set the background image for this slide in the line below -->
            @foreach($slide_images as $k=> $s)
                <div class="carousel-item @if($k==0) active @endif"
                     style="background-image: url('{{url($s->image)}}')">
                    <div class="carousel-caption d-none d-md-block">
                        {{--                    <h2 class="display-4">First Slide</h2>--}}
                        <p class="lead">{{$s->text}}</p>
                    </div>
                </div>
                <!-- Slide Two - Set the background image for this slide in the line below -->
            @endforeach

        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</header>
