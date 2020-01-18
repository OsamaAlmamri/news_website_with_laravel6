<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Chart with VueJS</title>

</head>
<body>
<div id="app">
    {!! $chart->container() !!}
</div>
<script src="https://unpkg.com/vue"></script>
<script>
    var app = new Vue({
        el: '#app',
    });
</script>
<script src=https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js charset=utf-8></script>
{!! $chart->script() !!}
</body>
</html>
