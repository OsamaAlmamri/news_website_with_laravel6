<style>
    .carousel-item {
        height: 100vh;
        min-height: 350px;
        background: no-repeat center center scroll;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

</style>

<marquee id="marquee"
         bgcolor="#000080" direction="left" height="80"
         direction="right"
         onmouseover=this.stop() onmouseout=this.start() scrolldelay="4"
         scrollamount="4">
    @foreach( liveNews(true) as $news)
        <a href="#"> {{$news->text}}</a>
    @endforeach
</marquee>
